<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Auth;
use Hash;
use DB;
use App\Models\User;
use App\Models\Code;

class MobileController extends Controller
{
    public function index(){
        return view('mobile.home');
    }
    public function location(Request $request)
    {
        // $ip = $request->ip();
        $ip = '197.156.140.165';
        $currentUserInfo = Location::get($ip);

        return view('mobile.location', compact('currentUserInfo'));
    }

    public function sign_up(Request $request)
    {
        // $ip = $request->ip();
        $ip = '197.156.140.165';
        $currentUserInfo = Location::get($ip);

        return view('mobile.sign-up', compact('currentUserInfo'));
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $Username = Auth::User()->email;
                return response()->json([
                    "message" => "Success"
                ]);
        }else{
                return response()->json([
                    "message" => "Fail"
                ]);
        }
    }

    public function sign_up_post(Request $request){
         $name = $request->name;
         $email = $request->email;
         $mobile = $request->mobile;
         $address = $request->address;
         $password = $request->password;
         $password_confirm = $request->password_confirm;

         $User = DB::table('users')->where('email',$email)->get();
         $Check = count($User);

         if($password == $password_confirm){
            if($Check == 0){
                // create user
                $password_inSecured = $password;
                //harshing password Here
                $password = Hash::make($password_inSecured);
                $User = new User;
                $User->name = $request->name;
                $User->email = $request->email;
                $User->location = $request->address;
                $User->mobile = $request->mobile;
                $User->notes = " ";
                $User->password = $password;
                $User->save();

                $user = User::where('email','=',$email)->first();
                Auth::loginUsingId($user->id, TRUE);
                return response()->json([
                    "message" => "Success"
                ]);
            }else{
                return response()->json([
                    "message" => "That email is already in use by another person"
                ]);
            }
        }else{
            return response()->json([
                "message" => "Password Did Not Match!"
            ]);
        }
    }
    public function generateCode(){
        $num_str = sprintf(mt_rand(1000, 9999));
        $Codes = DB::table('codes')->where('code',$num_str)->get();
        if($Codes->isEmpty()){
            $Add = new Code;
            $Add->code = $num_str;
            $Add->user = Auth::User()->id;
            $Add->save();
            $Code = $num_str;
        }else{
            $Code = $this->generateCode();
        }
        return $Code;
    }

    public function send_verification(Request $request){
        // Generate Random Code
        $Code = $this->generateCode();

        $Message = "$Code is Your Shaq's House Verification code";
        $PhoneNumber = $request->mobile;

        $this->send($Message,$PhoneNumber);
        return response()->json([
            "message" => "Success"
        ]);


    }

    public function verify(Request $request){
        $code = $request->code;
        $Check =  DB::table('codes')->where('code',$code)->get();
        if($Check->isEmpty()){
            return response()->json([
                "message" => "Wrong Code"
            ]);
        }else{
            $updateDetails = array('status'=>1);
            DB::table('codes')->where('user', Auth::User()->id)->where('code',$code)->update($updateDetails);
            return response()->json([
                "message" => "Success"
            ]);
        }
    }

    public function send($Message,$mobile){
        $message = $Message;
        $phone =$mobile;
        $senderid = "DESIGNEKTA";
        //
        $url = 'https://bulk.cloudrebue.co.ke/api/v1/send-sms';
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYnVsay5jbG91ZHJlYnVlLmNvLmtlXC8iLCJhdWQiOiJodHRwczpcL1wvYnVsay5jbG91ZHJlYnVlLmNvLmtlXC8iLCJpYXQiOjE2NTM5Nzc0NTEsImV4cCI6NDgwOTczNzQ1MSwiZGF0YSI6eyJlbWFpbCI6ImluZm9AZGVzaWduZWt0YS5jb20iLCJ1c2VyX2lkIjoiMTQiLCJ1c2VySWQiOiIxNCJ9fQ.N3y4QhqTApKi46YSiHmkaoEctO9z6Poc4k1g44ToyjA";

            $post_data=array(
            'sender'=>$senderid,
            'phone'=>$phone,
            'correlator'=>'Whatever',
            'link_id'=>null,
            'message'=>$message
            );

        $data_string = json_encode($post_data);
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization:Bearer '.$token,
                'Content-Length: ' . strlen($data_string)
                )
            );

        $response = curl_exec($ch);
        curl_close($ch);
        // print_r($response);
        // echo $response['status'];
        // die();
    }


}
