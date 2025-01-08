<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        // Add the attributes you want to be mass assignable
        'name',
        'description',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
