<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image',
        'status',
        'category_ar',
        'category_en',
    
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
    public function getCategoryAttribute()
    {
        $locale = app()->getLocale();
        $column = 'category_' . $locale;
        return $this->{$column} ?? $this->category_en;
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
