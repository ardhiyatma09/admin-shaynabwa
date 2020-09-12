<?php

namespace App\Models;

use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id');
    }
}
