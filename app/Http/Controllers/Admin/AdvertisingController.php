<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\PremiumImage;
use Illuminate\Http\Request;
use App\Models\PremiumTestImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvertisingController extends Controller
{
    public function index()
    {
        $premiumTestImages = PremiumTestImage::paginate(2);

        return view('admin.advertising.index',compact('premiumTestImages'));
    }

    public function create()
    {
        return view('admin.advertising.create');
    }

    public function edit(PremiumTestImage $premiumTestImage)
    {     
        return view('admin.advertising.edit',compact('premiumTestImage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg|dimensions:min_width=1920,min_height=600|max:2048',           
        ]);
            
        //$url = Storage::url($request->file('file')->store('premium'));
        $url = $request->file('file')->store('advertising');
        $user = User::where('email','etoomonline@gmail.com')->first();

        PremiumTestImage::create([
            'url' => $url,
            'route' => url('/advertising/index'),
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.advertising.index');
    }

    public function update(Request $request,PremiumTestImage $premiumTestImage)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg|dimensions:min_width=1920,min_height=600|max:2048',            
        ]);

       $premiumTestImage->update($request->all());

       if ($request->file('file')) {
            $url = Storage::put('advertising',$request->file('file'));       

            Storage::delete($premiumTestImage->url);

            $premiumTestImage->update([
                'url' => $url
            ]);

        }
        
        return redirect()->route('admin.advertising.index');
        
        /* eliminar la imagen existente */    

        /* Storage::delete($premiumTestImage->url);
        
        $url = Storage::url($request->file('file')->store('premium')); */
       /*  $url = $request->file('file')->store('advertising');
        $user = User::where('email','etoomonline@gmail.com')->first();

        PremiumTestImage::create([
            'url' => $url,
            'route' => $request->get('route'),
            'user_id' => $user->id
        ]); */
    }

    public function delete(PremiumTestImage $premiumTestImage)
    {
        Storage::delete($premiumTestImage->url);
        
        $premiumTestImage->delete();

        return back();
    }    
}
