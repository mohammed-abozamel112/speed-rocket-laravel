<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;
    /*  $table->string('name_ar'); // Added name column
              $table->string('name_en'); // Added name column
              $table->text('review_ar'); // Added review column
              $table->text('review_en'); // Added review column
              $table->string('image')->nullable(); // Added image column
              $table->integer('rating')->default(5); // Added rating column with default value */
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
