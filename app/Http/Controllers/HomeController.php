<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Freelancer;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function customerHome(){
    $customer = Customer::where('customer_id', auth()->user()->id)->first();
    return view('customerHome')->with('customer',$customer);
    }

    public function freelancerHome(){
    $freelancer = Freelancer::where('freelancer_id', auth()->user()->id)->first();    
    return view('freelancerHome')->with('freelancer', $freelancer);
    }
}
