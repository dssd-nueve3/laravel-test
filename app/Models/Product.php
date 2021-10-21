<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable =[
        'name',
        'description',
        'price'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_image')->singleFile()->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);

    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }

}   
