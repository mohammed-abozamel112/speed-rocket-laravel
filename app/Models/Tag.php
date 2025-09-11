<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image',
        'service_id',
        'blog_id',
        
    ];
    // Dynamic accessor for name attribute based on locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $column = 'name_' . $locale;
        return $this->{$column} ?? $this->name_en;
    }

    // Dynamic accessor for description attribute based on locale
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $column = 'description_' . $locale;
        return $this->{$column} ?? $this->description_en;
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    // projects relation
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    //images relation
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
