<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPhoto extends Model
{
    protected $table = 'product_photos';

    protected $fillable = [
        'product_id',
        'photo_url',
        'alt_text',
        'is_main',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
