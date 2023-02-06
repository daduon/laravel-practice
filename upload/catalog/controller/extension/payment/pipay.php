<?php
class ControllerExtensionPaymentPipay extends Controller {
	public function index() {
		if ($this->config->get('payment_pipay_test')) {
			$data['action'] = 'https://onlinepayment-uat.pipay.com/starttransaction';
		} else {
			$data['action'] = 'https://onlinepayment.pipay.com/starttransaction';
		}
        
		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        $data['mid'] = $this->config->get('payment_pipay_mid');
        $data['sid'] = $this->config->get('payment_pipay_sid');
		$data['did'] = $this->config->get('payment_pipay_did');
		$data['orderDate'] = $order_info['date_added'];
		$data['orderAmount'] = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
		$data['currency'] = $order_info['currency_code'];
		$data['orderid'] = $order_info['order_id'];
		$data['lang'] = $this->language->get('code');
		$data['orderDesc'] = $order_info['comment'];
		$data['payMethod'] = 'wallet';
		$data['trType'] = '2';
		$data['cancelTimer'] = $this->config->get('payment_pipay_cancelTimer');
        $data['digest'] = md5($this->config->get('payment_pipay_mid').$order_info['order_id'].$data['orderAmount']);
        $data['confirmURL'] = $this->url->link('extension/payment/pipay/callback');
        $data['cancelURL'] = $this->url->link('extension/payment/pipay/cancelPayment');
        
        return $this->load->view('extension/payment/pipay', $data);
	}

	public function callback() {
		$this->load->language('extension/payment/pipay');

		if (empty($this->request->get['orderID'])) {
			$order_id = 0;
		} else {
			$order_id = $this->request->get['orderID'];
        }
        
		$this->load->model('checkout/order');

		$order_info = $this->model_checkout_order->getOrder($order_id);

		$error = '';

		if ($order_info && !empty($this->session->data['order_id']) && ($order_info['order_id'] == $this->session->data['order_id'])) {
			if (empty($this->request->get['status']) && empty($this->request->get['transID']) && empty($this->request->get['processorID']) && empty($this->request->get['digest'])) {
				$error = $this->language->get('text_unable');
			}

			if ($this->request->get['status'] != '0000') {
				$error = $this->language->get('text_declined');
			}

			$digest = md5($this->request->get['transID'].$this->request->get['orderID'].$this->request->get['processorID']);
		
			if($this->request->get['digest'] !== $digest){
				$error = $this->language->get('text_declined');
			}

			if(empty($error))
			{
				$request =  array();
				$request['data']['orderID'] = urlencode($this->request->get['orderID']);
				$request['data']['processorID'] = urlencode($this->request->get['processorID']);

				if ($this->config->get('payment_pipay_test')) {
					$url = 'https://onlinepayment-uat.pipay.com/rest-api/verifyTransaction';
				} else {
					$url = 'https://onlinepayment.pipay.com/rest-api/verifyTransaction';
				}

				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode($request),
					CURLOPT_HTTPHEADER => array(
						"Content-Type: application/json"
					),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);
				
				if ($err) {
					$error = $this->language->get('text_internal_error');
					$this->log->write('DoDirectPayment failed: ' . $err);
				} else {
					$response_info = json_decode($response, true);
					$amount = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
					$currency = $order_info['currency_code'];
					
					if ($order_info['order_id'] == $this->session->data['order_id'] && $response_info['resultCode'] === '0000' && $response_info['data']['processorResponseCode'] === 'OK' && $response_info['data']['amount'] === $amount && $response_info['data']['currency'] === $currency && $response_info['data']['processorID'] === $request['data']['processorID']){
						$this->model_checkout_order->addOrderHistory($order_info['order_id'], $this->config->get('payment_pipay_order_status_id'));
						$this->response->redirect($this->url->link('checkout/success'));
					} elseif ($response_info['resultCode'] !== '0000' && empty($response_info['data']['processorResponseCode']) && empty($response_info['data']['amount'])){
						$error = $this->language->get('text_failed');
					} else {
						$error = $this->language->get('text_error_balance');
					}
				}
			}
		} else {
			$error = $this->language->get('text_unable');
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_basket'),
			'href' => $this->url->link('checkout/cart')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_checkout'),
			'href' => $this->url->link('checkout/checkout', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_failed'),
			'href' => $this->url->link('checkout/failure')
		);

		$data['text_message'] = sprintf($this->language->get('text_failed_message'), $error, $this->url->link('information/contact'));

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');			
		
		$this->response->setOutput($this->load->view('common/success', $data));
    }
    
    public function cancelPayment() {
        $this->load->language('extension/payment/pipay');
        $this->load->model('checkout/order');

		$error = '';
		$data = array();

        $order_id = $this->request->get['status'];
        $order_info = $this->model_checkout_order->getOrder($order_id);

		if ($order_info) {
            if (empty($this->request->get['status'])) {
                $error = $this->language->get('text_unable');
            } elseif ($this->request->get['status'] != '0200') {
                $error = $this->language->get('text_declined');
            }
		} else {
			$error = $this->language->get('text_unable');
        }
        
        if('0200' === $this->request->get['status'] || $error){
            $data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_basket'),
				'href' => $this->url->link('checkout/cart')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_checkout'),
				'href' => $this->url->link('checkout/checkout', '', true)
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_failed'),
				'href' => $this->url->link('checkout/failure')
			);

			$data['text_message'] = sprintf($this->language->get('text_failed_message'), $error, $this->url->link('information/contact'));

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
        }

        $this->response->setOutput($this->load->view('common/success', $data));
	}
}
