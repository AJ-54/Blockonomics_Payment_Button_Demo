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
        $user = Auth::user();
        if ($user->status == '2'){
            $premium = Product::all()->where('paid',1);
            return view('home')->with(['premium' => $premium, 'products' => $products]);
        }
        else{
            return view('home')->with(['products' => $products]);
        }
    }
}
