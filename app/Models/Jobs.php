<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
