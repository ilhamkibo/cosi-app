<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        // Add the attributes that are mass assignable
        'name',
        'description',
        // Add other fillable attributes here
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
