<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'slug_ar',
        'slug_en',
        'description_ar',
        'description_en',
        'image',
        'external_url',
        'github_url',
        'category_ar',
        'category_en',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug_ar = Str::slug($model->title_ar);
            $model->slug_en = Str::slug($model->title_en);
        });

        static::updating(function ($model) {
            $model->slug_ar = Str::slug($model->title_ar);
            $model->slug_en = Str::slug($model->title_en);
        });
    }
    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? 'slug_ar' : 'slug_en';
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $locale = app()->getLocale();
        $slugField = $locale === 'ar' ? 'slug_ar' : 'slug_en';

        $model = $this->where($slugField, $value)->first();

        if (!$model) {
            $otherSlugField = $locale === 'ar' ? 'slug_en' : 'slug_ar';
            $model = $this->where($otherSlugField, $value)->first();
        }

        return $model;
    }
    // slug attribute
    public function getSlugAttribute()
    {
        $locale = app()->getLocale();
        $column = 'slug_' . $locale;
        return $this->{$column} ?? $this->slug_en;
    }
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
