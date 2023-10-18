<?php

namespace App\Http\Controllers;

use App\Http\Requests\HireFreelancerRequest;
use App\Models\Jobs;
use App\Models\Skills;
use App\Models\Customer;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Models\Hired_Freelancer;
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
        $jobRequests = Customer_Freelancer::where('job_id', $job_id)->with('job','freelancer')->get();
        return view('show_customer_request')->with('jobRequests',$jobRequests);
    }

    public function hireFreelancer(Request $request){
        $skills = Skills::all();
        if($request['_token'] !=null){
        $validated = $request->validate(['skill' => 'required']);
        $skills = Skills::all();
        $freelancers = [];
        $input_skill = $request->input('skill');
        $min_price= $request->min_price ? $request->min_price : 0;
        $max_price= $request->max_price ? (int)$request->max_price  : 100;
        $sorting = $request->sorting ? $request->sorting : 'asc';
        $freelancers = Freelancer::whereHas('skills_freelancer', function($query) use ($input_skill) {
          $query->whereIn('skill_id', $input_skill);
        })->where('hourly_pay','<=',$max_price)->where('hourly_pay','>=',$min_price)->orderBy('hourly_pay', $sorting)->paginate(3);
        }
        else{
            $freelancers =Freelancer::with('user', 'skills_freelancer')->paginate(3);
        }
        return view('hire_freelancer')->with(['skills'=>$skills, 'freelancers'=>$freelancers]);

    }

    public function hire($freelancer_id){
        if(!(Hired_Freelancer::where(['customer_id' => auth()->user()->id,'freelancer_id' =>$freelancer_id ]))->first()){
            Hired_Freelancer::create([
                'freelancer_id' => $freelancer_id,
                'customer_id' =>auth()->user()->id
            ]);
            return redirect()->back()->with('success', 'Frilancer Hired.');
        }else{
            return redirect()->back()->with('error', 'Already Hired Freelancer.');
        }
        

    }
    

    public function filter(HireFreelancerRequest $request)
    {
      

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
