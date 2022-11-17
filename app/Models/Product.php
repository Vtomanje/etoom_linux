<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /* status */

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'update_at'];

    // ! Relacion uno a muchos inversa
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // ! Relacion uno a muchos inversa
    public function city(){
        return $this->belongsTo(City::class);
    }

    // ! Relacion uno a muchos inversa
    public function county(){
        return $this->belongsTo(County::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion uno a muchos polimoefica
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }

    public function user(){
        return $this->belongsTo(User::class); // user_id
    }

    /* relacion uno a uno */

    public function business()
    {
        return $this->hasOne(Business::class);
    }

    /* relacion uno a uno */

    public function filling_number() // filling_number_id
    {
        return $this->belongsTo(FillingNumber::class);
    }

    /* relacion uno a uno */

    public function premiumImage()
    {
        return $this->hasOne(PremiumImage::class,'product_id');
    }

    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
