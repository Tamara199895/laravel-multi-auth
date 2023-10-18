<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hired_Freelancer extends Model
{
    use HasFactory;
    protected $table = 'hired_freelancer';

    protected $fillable = [
        'freelancer_id',
        'customer_id',
    ];

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', 'freelancer_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
