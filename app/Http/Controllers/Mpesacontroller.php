<?php

namespace App\Http\Controllers;

use Mpesa;
use App\Models\MpesaTransaction;
use App\Models\MpesaTransactionB2C;
use App\Models\MpesaTransactionB2B;
use App\Models\STKMpesaTransaction;
use App\Models\MpesaTransactionStatus;
use App\Models\MpesaTransactionAccountBalance;
use App\Models\STKRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use DB;
use Auth;


class MpesaController extends Controller
{
      /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }
    /**
     * Lipa na M-PESA STK Push method
     * */
    public function customerMpesaSTKPush(Request $request)
    {
        $phoneNumber = $request->phone_number;
        $AmountSTK = $request->Amount;
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => env('BUSINESSSHORTCODE'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $AmountSTK,
            'PartyA' => $phoneNumber, // replace this with your phone number
            'PartyB' => env('STKPARTYB'),
            'PhoneNumber' => $phoneNumber, // replace this with your phone number
            'CallBackURL' => env('STK_CALLBACKURL'),
            'AccountReference' => "ASTE Company Limited",
            'TransactionDesc' => "TEST"
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        // return $curl_response;

         // Insert MerchantRequestID
         $curl_content=json_decode($curl_response);
         $MerchantRequestID = $curl_content->MerchantRequestID;
         $mpesa_transaction = new STKRequest;
         $mpesa_transaction->CheckoutRequestID =  $curl_content->CheckoutRequestID;
         $mpesa_transaction->MerchantRequestID =  $MerchantRequestID;
         $mpesa_transaction->user_id =  $request->user_id;
         $mpesa_transaction->PhoneNumber =  $phoneNumber;
         $mpesa_transaction->Amount =  $AmountSTK;
         $mpesa_transaction->save();
 
         $STKMpesaTransaction = new STKMpesaTransaction;
         $STKMpesaTransaction->user_id = $request->user_id;
         $STKMpesaTransaction->CheckoutRequestID = $curl_content->CheckoutRequestID;
         $STKMpesaTransaction->MerchantRequestID = $MerchantRequestID;
         $STKMpesaTransaction->save();
 
         Log::info($curl_response);
         $CheckoutRequestID = $curl_content->CheckoutRequestID;
         $table = 'lnmo_api_response';
         return $this->checklast($CheckoutRequestID,$table,$curl_response,$request->user_id);
    }

    public function customerMpesaSTKPushCallBack(Request $request){
        Log::info($request->getContent());
        $content=json_decode($request->getContent(), true);
        

            $nameArr = [];
            foreach ($content['Body']['stkCallback']['CallbackMetadata']['Item'] as $row) {
                
                if(empty($row['Value'])){
                    continue;
                }
                $nameArr[$row['Name']] = $row['Value'];
                // addUserID
            }
            DB::table('lnmo_api_response')->insert($nameArr);
            $LastRecord = DB::table('lnmo_api_response')->orderBy('lnmoID','desc')->first();
            foreach($LastRecord as $Last){
                $updateDetails = array(
                    'user_id' => Auth::user()->id,
                );
                DB::table('lnmo_api_response')->where('id',$Last->lnmoID)->update($updateDetails);
            }
        
        // Log To Laravel LOgs
        activity()->log('STK Payment Has Been Made');
        Log::info($request->getContent());
 
        // Responding to the confirmation request
        $response = new Response;
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["STKPUSHPaymentConfirmationResult"=>"Success"]));
        return $response;
    }
    

    public function generateAccessToken()
    {
        $consumer_key=env('MPESA_CONSUMER_KEY');
        $consumer_secret=env('M_PESA_CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
 
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

    /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }

    /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */
 
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }
 
    /**
     * M-pesa Transaction confirmation method, we save the transaction in our databases
     */
 
    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());
        Log::info($request->getContent());

        $mpesa_transaction = new MpesaTransaction();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();

        $LastRecord = DB::table('mobile_payments')->orderBy('transLoID','desc')->first();
        if(Auth::user()){
            
                $updateDetails = array(
                    'user_id' => Auth::user()->id,
                );
                DB::table('mobile_payments')->where('transLoID',$LastRecord->transLoID)->update($updateDetails);
            
        }else{
           
                $updateDetails = array(
                    'user_id' => $content->BillRefNumber,
                );
                DB::table('mobile_payments')->where('transLoID',$LastRecord->transLoID)->update($updateDetails);
            
        }
        

        // Log To Laravel LOgs
        activity()->log('C2B Payment Has Been Made');
        
 
        // Responding to the confirmation request
        $response = new Response;
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));
        return $response;
    }

     /**
     * M-pesa Register Validation and Confirmation method
     */

    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => "603021",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://pipdotfx.com/api/v1/transaction/confirmation",
            'ValidationURL' => "https://pipdotfx.com/api/v1/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }



 

    public function checklast($AccID,$table,$curl_response,$user){
        if($table == 'accountbalance'){
            $table == 'accountbalance';
            $TableData = DB::table('accountbalance')->orderBy('accountBalID', 'DESC')->first();
            //
               $lastRecord =  $TableData->accountBalID;
               if($lastRecord == $AccID){
                sleep(5);
                return $this->checklast($lastRecord,$table,$curl_response,$user);
               }else{
                   $newAccId = $AccID+1;
                   $NewBalance = DB::table('accountbalance')->where('accountBalID',$newAccId)->get();
                   foreach($NewBalance as $new){
                       return $new->WorkingAccount;
                   }
               }
            //
        }elseif($table == 'lnmo_api_response'){
                $table = 'lnmo_api_response';
                $TableData = DB::table('lnmo_api_response')->where('CheckoutRequestID', $AccID)->where('status','1')->get();
                if($TableData->isEmpty()){
                    sleep(10);
                    return $this->checklast($AccID,$table,$curl_response,$user);
                }else{
                    // Go To Requestes and set status to 1
                    $UpdateDetails = array(
                        'status'=>1,
                    );
                    $UpdateDetail = array(
                        'user_id'=>$user,
                    );
                    DB::table('s_t_k_requests')->where('CheckoutRequestID',$AccID)->update($UpdateDetails);
                    // DB::table('lnmo_api_response')->where('CheckoutRequestID',$AccID)->update($UpdateDetail);
                    return $curl_response;
                }
        }else{
            return "Done";
        }
    }


}
