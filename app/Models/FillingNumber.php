<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FillingNumber extends Model
{
    use HasFactory;

    protected $table = "filling_numbers";

    /* relacion uno a uno inversa */

    public function product()
    {
        return $this->hasOne(product::class); //filling_number_id
    }
}
