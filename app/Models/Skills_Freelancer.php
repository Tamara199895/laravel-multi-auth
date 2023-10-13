<?php

namespace App\Models;

use App\Models\Skills;
use App\Models\Freelancer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skills_Freelancer extends Model
{
    use HasFactory;
    protected $table = 'skills_freelancer';

    protected $fillable = [
        'skill_id',
        'freelancer_id',
    ];

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', 'freelancer_id');
    }
    public function skill()
    {
        return $this->belongsTo(Skills::class, 'skill_id', 'id');
    }
}
