<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Skills;
use App\Models\Customer;
use App\Models\Freelancer;
use App\Models\Job_Skills;
use Illuminate\Http\Request;
use App\Repository\JobsRepository;
use App\Models\Customer_Freelancer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\JobStoreRequest;
use Illuminate\Support\Facades\Validator;
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

    public function index()
    {
        // $jobs = Jobs::all();
        $jobs = $this->JobsRepository->all();

        return View::make('jobs.index')->with('jobs', $jobs);
    }


    public function newJob(JobStoreRequest $request)
    {
        $validated= $request->validated();
      
        $job = Jobs::create([
            'customer_id'=> $request->customer_id,
            'work_name' => $request->work_name,
            'work_description' => $request->work_description,
            'status' => $request->status
        ]);
        if($job){
        foreach($request->skills as $skill_id)
            Job_Skills::create([
                'job_id' => $job->id,
                'skill_id' =>$skill_id
            ]);
        }
        return redirect()->back()->with('success', 'Job successfully added.');
       }
        

    public function create()
    {
        $skills = Skills::all();
        return view('jobs.create')->with(['skills' => $skills]);

        // $validated = $request->validated();        
        // $user =  Jobs::create($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer_freelancer = Customer_Freelancer::where('freelancer_id', Auth::id())->where('job_id', $request->job_id)->first();
        if (!$customer_freelancer) {
            Customer_Freelancer::create([
                'freelancer_id' => Auth::id(),
                'job_id' => $request->job_id,
            ]);

            return redirect()->back()->with('success', 'Customer will see your response.');
        } else {
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
        return view('jobs.rate')->with(['job_id' => $job_id, 'customer_id' => $customer_id, 'freelancer_id' => $freelancer_id]);
    }

    public function releaseProject($id)
    {
        $job = Jobs::find($id);
        if ($job->freelancer_id && $job->status == 'started') {
            $job->update(['status' => 'completed']);
            // dd($job->status);
        }
        return redirect()->back();
    }

    public function approve($job_id, $customer_id, $freelancer_id)
    {
        Jobs::where('id', $job_id)
            ->update(
                [
                    'freelancer_id' => $freelancer_id,
                    'status' => 'started'
                ]
            );
        Customer_Freelancer::where('job_id', $job_id)->delete();
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