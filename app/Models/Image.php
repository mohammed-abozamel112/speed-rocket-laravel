<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'alt_text_ar',
        'alt_text_en',
        'short_description_ar',
        'short_description_en',
        'caption_ar',
        'caption_en',
        'type_ar',
        'type_en',
        'tag_id',
        'blog_id',
        'service_id',
    ];
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        $column = 'name_' . $locale;
        return $this->{$column} ?? $this->name_en;
    }
    public function getAltTextAttribute()
    {
        $locale = app()->getLocale();
        $column = 'alt_text_' . $locale;
        return $this->{$column} ?? $this->alt_text_en;
    }
    public function getCaptionAttribute()
    {
        $locale = app()->getLocale();
        $column = 'caption_' . $locale;
        return $this->{$column} ?? $this->caption_en;
    }
    public function getTypeAttribute()
    {
        $locale = app()->getLocale();
        $column = 'type_' . $locale;
        return $this->{$column} ?? $this->type_en;
    }
    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $column = 'short_description_' . $locale;
        return $this->{$column} ?? $this->short_description_en;
    }
    // tag relation
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    // blog relation
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    // service relation
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
