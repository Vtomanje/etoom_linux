<?php

namespace App\Http\Controllers;

use App\Models\PremiumTestImage;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function index()
    {
        $premiumTestImages = PremiumTestImage::paginate(2);

        return view('advertising.index',compact('premiumTestImages'));
    }
}
