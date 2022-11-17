<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'update_at'];

     // ! relacion uno a muchos

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function counties(){
        return $this->hasMany(County::class);
    }
}