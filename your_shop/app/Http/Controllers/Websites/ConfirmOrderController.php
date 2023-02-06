<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class JsonObject
{
	public $orderID;
	public $processorID;
}

class JsonData
{
	public $data;
}

class ConfirmOrderController extends Controller
{
    public function callback(Request $request){
        $infoCart = $request->session()->get('cart');
        $orderID = $request->input('orderID');
        $transID = $request->input('transID');
        $processorID = $request->input('processorID');
        $digestfront = $request->input('digest');
		$digestSimfonie = md5($transID.$orderID.$processorID);

		$jsonobject = new jsonObject();
		$jsonobject->orderID = $orderID;
		$jsonobject->processorID = $processorID;

		$jsondata = new JsonData();
		$jsondata->data = $jsonobject;
		$myJSON = json_encode($jsondata);

		$url = "https://onlinepayment-uat.pipay.com/rest-api/verifyTransaction";
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($jsondata),
		  CURLOPT_HTTPHEADER => array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"Postman-Token: 1c9ccf75-9e45-0441-aae3-c3efa0ce1514"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		$result = json_decode($response);
		// dd($result);
		curl_close($curl);
        // "{"resultCode":"0000","data":{"processorResponseCode":"OK","amount":1,"currency":"USD","processorID":"890436"}}"
		if ($err) {
            dd('fail');
		  	echo "cURL Error #:" . $err;
		} else {
			if ($result->resultCode == "0000" && $result->data->processorResponseCode == "OK" && $result->data->currency == "USD" && $digestfront == $digestSimfonie) {
				foreach($infoCart as $data){
					Order::create([
						'cat_id' => $data['cat_id'],
						'pro_id' => $data['pro_id'],
						'name' => $data['name'],
						'quantity' => $data['quantity'],
						'price' => $result->data->amount,
						'image' => $data['image']
					]);
				}
				$request->session()->flush();
			}else{
				dd('verify fail');
			}
		}

        return redirect('/');
    }
}
