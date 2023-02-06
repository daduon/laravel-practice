<?php

namespace App\Http\Controllers\Api;

use Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SMSNotification;

class HomeController extends ApiController
{
    public function send() 
    {
    	$user = User::first();
        $project = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'This is the project assigned to you.',
            'thanks' => 'Thank you this is from codeanddeploy.com',
            'actionText' => 'View Project',
            'actionURL' => url('/'),
            'id' => 57
        ];
  
        Notification::send($user, new SMSNotification($project));
   
        return response()->json( $project, 200);
    }
}
