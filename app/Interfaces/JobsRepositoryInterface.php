<?php

namespace App\Interfaces;

use App\Models\Jobs;
use Illuminate\Support\Collection;

interface JobsRepositoryInterface
{
    
    function all() : Collection;
    function find(String $id) : ?Jobs;
    function insert(Array $attributes) : Bool;
    function update(String $id, Array $attributes) : Bool;
    function delete(String $id) : Bool;
}