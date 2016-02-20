<?php

namespace FRD;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function images()
    {
        return $this->hasMany('FRD\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('FRD\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('FRD\Tag');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();

        return implode(',', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured',1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend',1);
    }

    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id', $type);
    }
}
