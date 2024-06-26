<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = [
        'customer_id',
        'company_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function job()
    {
        return $this->hasMany(Jobs::class);
    }
}
