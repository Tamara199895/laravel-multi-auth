<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Skills;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Models\Skills_Freelancer;
use App\Repository\JobsRepository;
use App\Http\Requests\FreelancerSkilleRequest;

class FreelancerController extends Controller
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
        $skills = Skills::all();
        return view('freelancer_skills')->with('skills',$skills);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function createSkills(FreelancerSkilleRequest $request)
    {
        $validated = $request->validated();
            
            foreach($validated['skill_id'] as $skill_id){
            if(!(Skills_Freelancer::where(['freelancer_id' => auth()->user()->id,'skill_id' =>$skill_id ]))->first()){
                Skills_Freelancer::create([
                    'freelancer_id' => auth()->user()->id,
                    'skill_id' =>$skill_id
                ]);
            }
            return redirect()->back()->with('success', 'Skills successfully added.');
            }
    }


    public function searchWithSkills()
    {
        $jobs = Jobs::with('skills')->get();
        $skills = Skills::all();
        return view('search_with_skills')->with(['jobs'=> $jobs, 'skills'=>$skills]);
    }

    public function filter(Request $request)
    {
        $skills = Skills::all();
        $jobs = [];
        $input_skill = $request->input('skill');
        $jobs = Jobs::whereHas('job_skills', function($query) use ($input_skill) {
            $query->whereIn('skill_id', $input_skill);
        })->get();
        return view('search_with_skills')->with(['skills'=>$skills, 'jobs'=>$jobs]);

    }
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jobs = Jobs::where('freelancer_id',$id)->get();
        return view('freelancer_jobs')->with('jobs',$jobs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Freelancer $freelancer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Freelancer $freelancer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Freelancer $freelancer)
    {
        //
    }
}
