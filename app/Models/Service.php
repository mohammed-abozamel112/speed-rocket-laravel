<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
      protected $fillable = [
        'name_ar',
        'name_en',
        'short_description_ar',
        'short_description_en',
        'sub_title1_ar',
        'sub_title1_en',
        'sub_title2_ar',
        'sub_title2_en',
        'sub_title3_ar',
        'sub_title3_en',
        'description1_ar',
        'description1_en',
        'description2_ar',
        'description2_en',
        'description3_ar',
        'description3_en',
        'image',
        'status',
        
    ];
    // Dynamic accessor for name attribute based on locale
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $column = 'name_' . $locale;
        return $this->{$column} ?? $this->name_en;
    }

    // Dynamic accessor for short_description attribute based on locale
    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $column = 'short_description_' . $locale;
        return $this->{$column} ?? $this->short_description_en;
    }

    // Dynamic accessor for sub_title1 attribute based on locale
    public function getSubTitle1Attribute()
    {
        $locale = app()->getLocale();
        $column = 'sub_title1_' . $locale;
        return $this->{$column} ?? $this->sub_title1_en;
    }

    // Dynamic accessor for sub_title2 attribute based on locale
    public function getSubTitle2Attribute()
    {
        $locale = app()->getLocale();
        $column = 'sub_title2_' . $locale;
        return $this->{$column} ?? $this->sub_title2_en;
    }

    // Dynamic accessor for sub_title3 attribute based on locale
    public function getSubTitle3Attribute()
    {
        $locale = app()->getLocale();
        $column = 'sub_title3_' . $locale;
        return $this->{$column} ?? $this->sub_title3_en;
    }

    // Dynamic accessor for description1 attribute based on locale
    public function getDescription1Attribute()
    {
        $locale = app()->getLocale();
        $column = 'description1_' . $locale;
        return $this->{$column} ?? $this->description1_en;
    }

    // Dynamic accessor for description2 attribute based on locale
    public function getDescription2Attribute()
    {
        $locale = app()->getLocale();
        $column = 'description2_' . $locale;
        return $this->{$column} ?? $this->description2_en;
    }

    // Dynamic accessor for description3 attribute based on locale
    public function getDescription3Attribute()
    {
        $locale = app()->getLocale();
        $column = 'description3_' . $locale;
        return $this->{$column} ?? $this->description3_en;
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    // images relation
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /* public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    } */
}
