<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Freelancer extends Model
{
    use HasFactory;
    protected $table = 'freelancer';

    protected $fillable = [
        'freelancer_id',
        'hourly_paid',
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
