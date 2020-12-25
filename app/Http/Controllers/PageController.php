<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Table;

class PageController extends Controller
{
    public function home()
    {
        // Check if user is logged in or not. 
        // If user is logged in and unpaid do return normal page 
        // If user has logged in and made unconfirmed payment, do mention that on page
        // If user is paid one, show him premium page. 
        return redirect()->route('register');
    }

}