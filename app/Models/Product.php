<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'sku',
        'description',
        'long',
        'width',
        'height',
        'price',
        'stock',
        'category_id',
        'stock_quantity',
    ];

    public function product_category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function product_photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function product_materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'product_materials', 'product_id', 'material_id')
            ->withPivot('quantity_used');
    }
}
