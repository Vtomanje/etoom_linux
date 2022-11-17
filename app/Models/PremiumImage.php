<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumImage extends Model
{
    use HasFactory;

    protected $fillable = ['url','route','user_id','product_id'];

    /* relacion uno a uno inversa */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
