<?php

namespace App\Models;

use App\Models\Jobs;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer_Freelancer extends Model
{
    use HasFactory;
    protected $table = 'customer_freelancer';

    protected $fillable = [
        'freelancer_id',
        'job_id',
        'signed'
    ];

    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }
    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', 'freelancer_id');
    }
}
