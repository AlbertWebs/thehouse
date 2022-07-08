<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Mail;

class ReplyMessage extends Model
{
    public static function SendMessage($body,$subject,$name,$to,$id){
        //The Generic mailler Goes here
        $data = array(
            'name'=>$name,
            'subject'=>$subject,
            'messageAppend'=>$body
        );
        $appName = config('app.name');
        $appEmail = config('mail.username');


        $FromVariable = $appEmail;
        $FromVariableName = $appName;

        $toVariable = $to;
        $toVariableName = $name;


        Mail::send('mail', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('')->cc('')->subject($subject);

        });
    }



    public static function mailclient($email,$name,$InvoiceNumber,$ShippingFee,$TotalCost){
        $subject = "Your Order Is Placed!";
        $FromVariable = "shaqshouselimited@gmail.com";
        $FromVariableName = "Shaq's Choma Zone";
        $toVariable = $email;
        $toVariableName = $name;
        $data = array(
            'name'=>$name,
            'subject'=>$subject,
            'invoicenumber'=>$InvoiceNumber,
            'ShippingFee'=>$ShippingFee,
            'CartItems'=>\Cart::getContent(),
            'TotalCost'=>\Cart::getTotal(),
            'content'=>"Thank You For Choosing Shaq's House",
        );
        Mail::send('mailClient', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('albertmuhatia@gmail.com')->cc('info@shaqshouse.co.ke')->subject($subject);
        });
    }
}
