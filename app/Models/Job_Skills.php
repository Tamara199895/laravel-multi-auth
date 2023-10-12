<?php

namespace App\Models;

use App\Models\Jobs;
use App\Models\Skills;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job_Skills extends Model
{
    use HasFactory;
    protected $table = 'job_skills';

    protected $fillable = [
        'skill_id',
        'job_id',
    ];


    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }
    public function skill()
    {
        return $this->belongsTo(Skills::class);
    }
}
