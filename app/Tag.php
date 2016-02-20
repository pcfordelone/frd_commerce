<?php

namespace FRD;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('FRD\Product');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');

        return $tags;
    }

    public function getProductListAttribute()
    {
        return $this->products;
    }
}
