<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all()->where('paid',0);
    
        if(Transaction::where('user_id',Auth::id())->count()){
            $user = Auth::user();
            $transaction = DB::table('transactions')->where('user_id',Auth::id())->latest()->first();

            error_log("Home Controller Here ");
            error_log($transaction->address);
            error_log($transaction->status);

            if ($user->premium){
                $premium = Product::all()->where('paid',1);
                return view('home')->with(['premium' => $premium, 'products' => $products, 'transaction' => $transaction]);
            }
            else{
                return view('home')->with(['products' => $products, 'transaction' => $transaction]);
            }
        }else{
            return view('home')->with(['products' => $products]);
        }
        
        
    }

}
