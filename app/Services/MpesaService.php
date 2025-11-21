<?php

namespace App\Services;

use Faker\Provider\ar_EG\Payment;
use GuzzleHttp\Client;

class MpesaService {
    protected $consumerKey;
    protected $consumerSecret;
    protected $shortCode;
    protected $passKey;
    protected $callbackUrl;
    protected $env;

    public function __construct() {
        $this->consumerKey = config('mpesa.consumer_key');
        $this->consumerSecret = config('mpesa.consumer_secret');
        $this->shortCode = config('mpesa.shortcode');
        $this->passKey = config('mpesa.lipa_na_mpesa_passkey');
        $this->callbackUrl = config('mpesa.callback_url');
        $this->env = config('mpesa.environment');
    }

    public function getToken() {
        $url = $this->env === 'sandbox'
            ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $client = new Client();
        $response = $client->request('GET', $url, [
            'auth' => [$this->consumerKey, $this->consumerSecret]
        ]);

        $body = json_decode($response->getBody(), true);

        return $body['access_token'] ?? null;
    }

    public function stkPush($phone, $amount, $accountRef = 'Order') {
        $token = $this->getToken();

        if(!$token){
            return false;
        }

        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortCode. $this->passKey . $timestamp);

        $url = $this->env === 'sandbox'
              ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
              : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token, 
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'BusinessShortCode' =>$this->shortCode,
                'Password' =>$password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount'=> $amount,
                'PartyA' => $phone,
                'PartyB' => $this->shortCode,
                'PhoneNumber' =>$phone,
                'CallBackURL' => $this->callbackUrl,
                'AccountReference' => $accountRef,
                'TransactionDesc' => 'Payment for GadgetSoko order',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}