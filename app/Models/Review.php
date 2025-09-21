<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'review_ar',
        'review_en',
        'image',
        'rating',
        'email', // Uncomment if email is needed
    ];
    // Dynamic accessor for name attribute based on locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $column = 'name_' . $locale;
        return $this->{$column} ?? $this->name_en;
    }
    // Dynamic accessor for review attribute based on locale
    public function getReviewAttribute()
    {
        $locale = app()->getLocale();
        $column = 'review_' . $locale;
        return $this->{$column} ?? $this->review_en;
    }

}
