<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'update_at'];

    //Relacion uno a muchos
    public function cities(){
        return $this->hasMany(City::class);
    }
    
    // ! relacion uno a muchos

    public function products()
    {
        return $this->hasMany(Product::class);
    }
   
}