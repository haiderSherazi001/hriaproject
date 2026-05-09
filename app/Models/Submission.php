<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = [
    'full_name', 'father_name', 'address', 'city', 'whatsapp', 'photo_path', 'status', 
    'qualification', 'batch', 'job_role', 'company', 'skills', 
    'achievement', 'contributions', 'availability', 
    'seriousness', 'suggestions'
    ];

    protected $casts = [
        'contributions' => 'array',
    ];

    /**
     * Standardize City input
     */
    protected function city(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::title(strtolower($value))
        );
    }

    /**
     * Standardize Full Name input
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::title(strtolower($value))
        );
    }

    /**
     * Standardize Father Name input
     */
    protected function fatherName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::title(strtolower($value))
        );
    }
}
