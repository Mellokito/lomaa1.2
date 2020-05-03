<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Validator;

class EmailController extends Controller
{
    public function contact(){
        return view('site.contact');
    }
    
    public function send_mail(Request $request){
        
        // $to_name = ‘RECEIVER_NAME’;
        // $to_email = ‘RECEIVER_EMAIL_ADDRESS’;
        // $data = array(‘name’=>”Ogbonna Vitalis(sender_name)”, “body” => “A test mail”);
        // Mail::send(‘emails.mail’, $data, function($message) use ($to_name, $to_email) {
        // $message->to($to_email, $to_name)
        // ->subject(Laravel Test Mail’);
        // $message->from(‘SENDER_EMAIL_ADDRESS’,’Test Mail’);
        // });

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'message' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ];

          
            \Mail::to('staardus2t@gmail.com')->send(new SendMail($details));
            return view('site.contact');
        }
    }
}
