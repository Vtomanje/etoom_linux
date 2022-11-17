<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumTestImage extends Model
{
    protected $fillable = ['url','route','user_id'];

    use HasFactory;
}
