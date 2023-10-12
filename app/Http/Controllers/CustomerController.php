<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Customer;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Models\Customer_Freelancer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {   
        $jobs = Jobs::where('customer_id',$id)->get();
        return view('customer_created_jobs')->with('jobs',$jobs);
    }

    public function show_customer_request($job_id)
    {   
        $jobRequests = Customer_Freelancer::where('job_id', $job_id)->get();
        dd($jobRequests);
        return view('show_customer_request')->with('jobRequests',$jobRequests);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
