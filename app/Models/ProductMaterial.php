<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    protected $table = 'product_materials';

    protected $fillable = [
        'product_id',
        'material_id',
        'quantity_used',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
