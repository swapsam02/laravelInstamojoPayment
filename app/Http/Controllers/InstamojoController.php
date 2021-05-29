<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class InstamojoController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){  
            try{
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                            array("X-Api-Key:test_YOUR-API-KEY",
                                "X-Auth-Token:test_YOUR-TOKEN"));
                $payload = Array(
                    'purpose' => 'Demo',
                    'amount' => $request->amount,
                    'phone' => $request->mobile_number,
                    'buyer_name' => $request->name,
                    'redirect_url' => 'http://127.0.0.1:8000/payment-success',
                    'send_email' => true,
                    'send_sms' => true,
                    'email' => $request->email,
                    'allow_repeated_payments' => false
                );
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                $response = curl_exec($ch);
                curl_close($ch);
                $response = json_decode($response);
                return redirect($response->payment_request->longurl);
            }catch(Exception $e){
                return redirect()->with('warning', $e->getMessage());
            }
        }
        return view('registration');
    }

    public function paySuccess(Request $request)
    { 
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_test_YOUR-API-KEY",
                "X-Auth-Token:test_YOUR-TOKEN"));

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $response = json_decode($response);
        return view('success', compact('response'));
    }   
}
