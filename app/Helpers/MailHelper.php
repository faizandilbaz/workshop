<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

class MailHelper{

    public static function workshop($company){
        $receivers = $company->employees;
        $data = ['user' => ''];
            foreach($receivers as $receiver){
                Mail::send('mail.workshop', $data, function ($message) use ($receiver){
                    $message->from('workshop@support.com', 'Workshop');
                    $message->to($receiver->email, $receiver->name)
                    ->subject('New workshop');
                });
            }
  
    }
    
    public static function sendDoctor($receiver){
        $data = ['user' => $receiver];

        Mail::send('mail.doctorRegistration', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to('dc2728@gmail.com', $receiver->name)
            ->subject('New Registration');
        });
    }

    public static function sendMessage($receiver){
        $data = ['user' => $receiver];

        Mail::send('mail.cv_message', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to($receiver->email, $receiver->first_name)
            ->subject('New Redacted CV Received');
        });
    }          

    public static function sendLink($receiver,$link){
        $data = ['link' => $link];
        Mail::send('mail.send_link', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to($receiver->email, $receiver->first_name)
            ->subject('New Zooom link Received');
        });
    }
    public static function senducv($receiver){
        $data = ['link' => 'asdfsd'];
        Mail::send('mail.ucv', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to($receiver->email, $receiver->first_name)
            ->subject('Unreducted Cv Received');
        });
    }
    
    public static function msgReceived($receiver){
        $data = ['link' => 'asdfsd'];
        Mail::send('mail.msg_rcv', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to($receiver->email, $receiver->first_name)
            ->subject('New Message Received');
        });
    }
    
    public static function downpayment($receiver){
        $data = ['provider' => $receiver];
        Mail::send('mail.downPayment', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to('dc2728@gmail.com', $receiver->first_name)
            ->subject('Down payment Received');
        });
    }
    
    public static function monthlyPayment($receiver){
        $data = ['provider' => $receiver];
        Mail::send('mail.monthlyPayment', $data, function ($message) use ($receiver){
            $message->from('doctors4providers@support.com', 'Doctors4Providers');
            $message->to('dc2728@gmail.com', $receiver->first_name)
            ->subject('Monthly payment Received');
        });
    }

}