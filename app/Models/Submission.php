<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
    'full_name', 'city', 'whatsapp', 'photo_path', 'status', 
    'qualification', 'batch', 'job_role', 'company', 'skills', 
    'achievement', 'contributions', 'availability', 
    'seriousness', 'suggestions'
    ];

    protected $casts = [
        'contributions' => 'array',
    ];
}
