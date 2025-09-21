<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'description_ar',
        'description_en',
        'service_id',
        'blog_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug_ar = Str::slug($model->name_ar);
            $model->slug_en = Str::slug($model->name_en);
        });

        static::updating(function ($model) {
            $model->slug_ar = Str::slug($model->name_ar);
            $model->slug_en = Str::slug($model->name_en);
        });
    }

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
}
