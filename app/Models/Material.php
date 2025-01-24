<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'slug', 'unit'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_materials', 'material_id', 'product_id')
            ->withPivot('quantity_used');
    }
}
