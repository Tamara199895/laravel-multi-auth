<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Freelancer extends Model
{
    use HasFactory;
    protected $table = 'customer_freelancer';

    protected $fillable = [
        'customer_id',
        'freelancer_id',
        'job_id',
        'signed'
    ];
}
