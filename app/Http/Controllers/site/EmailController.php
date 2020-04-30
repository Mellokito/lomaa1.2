<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send_mail(){
        
        // $to_name = ‘RECEIVER_NAME’;
        // $to_email = ‘RECEIVER_EMAIL_ADDRESS’;
        // $data = array(‘name’=>”Ogbonna Vitalis(sender_name)”, “body” => “A test mail”);
        // Mail::send(‘emails.mail’, $data, function($message) use ($to_name, $to_email) {
        // $message->to($to_email, $to_name)
        // ->subject(Laravel Test Mail’);
        // $message->from(‘SENDER_EMAIL_ADDRESS’,’Test Mail’);
        // });

            $details =[
                'title' => 'Titre du mail',
                'body' => 'Body du mail'
            ];

            \Mail::to('staardus2t@gmail.com')->send(new SendMail($details));
            return redirect()->back();
    }
}
