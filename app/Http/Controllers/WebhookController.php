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

        if(Transaction::where('address', $address)->count()){
            $transaction = Transaction::where('address', $address)->first();
            $transaction->status = (string)$status;
            $user = User::find($transaction->user_id);
            error_log($user->email);
            if($status == 2){
                $user->premium = 1;
                $user->save();
            }
            else{
                $user->premium = 0;
                $user->save();
            }
            $user->transactions()->save($transaction);
        }
        else{
            $transaction = new Transaction;
            try{
                $client =  new Client();
                $response = $client->get('https://www.blockonomics.co/api/merchant_order/'.$address,[
                    'headers'=>['Authorization'=> 'Bearer 5RR8EaCwLyRpzEjZx25MmSaRmJ8VoCOHmu8lY0WDH9I'],
                ]);
                $data = json_decode($response->getBody());
                $data_string =json_encode($data);

                error_log($data_string);
                error_log($data->emailid);

                $transaction->address = $data->address;
                $transaction->status = (string)$data->status;
                $mail = $data->emailid;

                $user = User::where('email','=',$mail)->first();
                if($transaction->status == 2){
                    $user->premium = 1;
                    $user->save();
                }
                else{
                    $user->premium = 0;
                    $user->save();
                }
                $user->transactions()->save($transaction);    
            }
            catch (\Exception $e){
                error_log($e);
            }
            
        }
    }
}
