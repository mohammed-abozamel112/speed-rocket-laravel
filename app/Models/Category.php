<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
      protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'service_id',
        'blog_id',
    ];
     public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $column = 'name_' . $locale;
        return $this->{$column} ?? $this->name_en;
    }
     public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $column = 'description_' . $locale;
        return $this->{$column} ?? $this->description_en;
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
