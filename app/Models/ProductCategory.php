<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'photo_url'];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
