<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    protected $table = 'skills';

    protected $fillable = [
        'skill_name'
        ];
        public function jobs() {
            return $this->belongsToMany(Jobs::class, 'job_skills', 'job_id', 'skill_id');
    
    
        }    
}
