<?php
namespace App\Repository;

use App\Models\Jobs;
use Illuminate\Support\Collection;
use App\Interfaces\JobsRepositoryInterface;


class JobsRepository implements JobsRepositoryInterface
{
    public function all() : Collection
    {
        return Jobs::all();
    }

    public function find(String $id) : ?Jobs
    {
        return Jobs::find($id);
    }
    
    public function insert(Array $attributes) : Bool
    {
        $jobs = Jobs::insert($attributes);
        return $jobs;
    }
    
    public function update(String $id, Array $attributes) : Bool
    {
        $jobs = Jobs::find($id);
        return $jobs->update($attributes);
    }
    
    public function delete(String $id) : Bool
    {
        $jobs = Jobs::find($id);
        return $jobs->delete();
    }
    
}
