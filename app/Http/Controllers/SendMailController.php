<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendQueueEmail;
use Illuminate\Support\Facades\DB;
use App\Models\subscriber;

class SendMailController extends Controller
{
    //
    public function sendEmail()
    {
        $details = [
            'title'=>'Mail from Pratham',
            'body'=>'This is test',
            'subject' => 'Test Notification'
        ];

        $data = subscriber::all();
        
        foreach($data as $email)
        {   
            $mail=$email->email; 
           // print_r($email);
            Mail::to($email)->send(new SendMail($details));    
        }
        
        return redirect('sendNotification')->with('success', 'Mail Sent');
      //  return redirect()->back()->with('sucess','Mail Sent');

    }
    public function send_mail(Request $request)
    {
    	$details = [
    		'subject' => 'Test Notification'
    	];
    	
        $job = (new \App\Jobs\SendQueueEmail($details))
            	->delay(now()->addSeconds(2)); 

        dispatch($job);
        echo "Mail send successfully !!";
    }
}
