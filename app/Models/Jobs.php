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
        'rate'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function skills() {
        return $this->belongsToMany(Skills::class, 'job_skills', 'skill_id', 'job_id');


    }    
}
