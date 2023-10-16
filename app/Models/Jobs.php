<?php

namespace App\Models;

use App\Models\Skills;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    protected $fillable = [
        'customer_id',
        'freelancer_id',
        'work_name',
        'work_description',
        'status',
        'rate',
        'rate_description'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function skills() {
        return $this->belongsToMany(Jobs::class, 'job_skills', 'job_id', 'skill_id');
    }    
    public function job_skills() {

        return $this->hasMany(Job_SKills::class,$foreignKey = 'job_id',$localKey = 'id');

    }  
}
