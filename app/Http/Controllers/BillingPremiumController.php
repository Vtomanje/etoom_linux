<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingPremiumController extends Controller
{
    public function index()
    {
        return view('billing.premium');
    }
}
