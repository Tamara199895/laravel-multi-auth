<?php

namespace App\Http\Controllers;
use App\Models\Jobs;
use App\Models\Customer;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Repository\JobsRepository;
use App\Models\Customer_Freelancer;
use Illuminate\Support\Facades\View;
use App\Interfaces\JobsRepositoryInterface;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(JobsRepositoryInterface $JobsRepository)
    {
        $this->JobsRepository = $JobsRepository;
    }
    public function list(Request $request)
    {
        return $this->JobsRepository->all();
    }
    public function index()
    {
        // $jobs = Jobs::all();
        $jobs = $this->JobsRepository->all();

        return View::make('jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function apply($customer_id,$freelancer_id,$job_id){
        dd('$customer_id');
     }

     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer_freelancer = Customer_Freelancer::where('customer_id', $request->customer_id)->where('freelancer_id', $request->freelancer_id)->where('job_id', $request->job_id)->first();
        if(!$customer_freelancer){
       Customer_Freelancer::create([
            'customer_id' => $request->customer_id,
            'freelancer_id' => $request->freelancer_id,
            'job_id' => $request->job_id,
        ]);
        
        return redirect()->back()->with('success', 'Customer will see your response.');
        }else{
            return redirect()->back()->with('error', 'You have already send your responce.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = $this->JobsRepository->find($id);
        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //   
    }

    public function rate($job_id, $customer_id, $freelancer_id)
    {
        return view('jobs.rate')->with(['job_id'=>$job_id, 'customer_id'=> $customer_id, 'freelancer_id'=> $freelancer_id]);
    }

    public function releaseProject($id){
        $job = Jobs::find($id);
        if($job->freelancer_id && $job->status== 'started' ){
            $job->update(['status' => 'completed']);
            // dd($job->status);
        }
        return redirect()->back();
    }

    public function approve($job_id,$customer_id,$freelancer_id)
    {
        Jobs::where('id', $job_id)
        ->update(['freelancer_id' => $freelancer_id,
                 'status'=> 'started']
                );
        Customer_Freelancer::where('job_id',$job_id)->delete();
        // dd($requests);
        $job = $this->JobsRepository->find($customer_id);
        return view('jobs.show')->with('job', $job);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
