<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
        'external_url',
        'github_url',
        'category_ar',
        'category_en',
    ];
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $column = 'title_' . $locale;
        return $this->{$column} ?? $this->title_en;
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
    // create relation with tags many to many
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    // create relation with client many to one
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
