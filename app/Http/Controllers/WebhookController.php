<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $address = $request->addr;
        $status = $request->status;
        error_log("Error Logs for  Webhook Handle");
        error_log($address);
        error_log($status);

        try{
            $client =  new Client();
            $response = $client->get('https://www.blockonomics.co/api/merchant_order/'.$address,[
                'headers'=>['Authorization'=> 'Bearer 5RR8EaCwLyRpzEjZx25MmSaRmJ8VoCOHmu8lY0WDH9I'],
            ]);
            $data = json_decode($response->getBody());
            $data_string =json_encode($data);

            error_log($data_string);
            error_log($data->emailid);

           
            $mail = $data->data->emailid;
            $user = User::where('email','=',$mail)->first();
            $user->status = (string)$status;
            error_log($user->email);
            $user->save();   
        }
        catch (\Exception $e){
            error_log($e);
        }
    }
}
