<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PremiumImage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PremiumController extends Controller
{

    public function index()
    {   

       /*  $this->authorize('premium',User::class); */

        $user = User::find(auth()->user()->id);

        $premiumImages = PremiumImage::where('user_id',$user->id)->get();  
        
        $product = null;

        if (isset($user->premiumImage->product_id)) {
            $product = Product::find($user->premiumImage->product_id);
        }

        return view('admin.premium.index',compact('premiumImages','product'));
    }


    public function create()
    {
       /*  $this->authorize('premium',User::class); */

        $products = Product::where('user_id',auth()->user()->id)->get();
        
        return view('admin.premium.create',compact('products'));
    }

    public function edit($premiumImage)
    {
       /*  $this->authorize('premium',User::class); */

        $products = Product::where('user_id',auth()->user()->id)->get();
        $premiumImage = PremiumImage::find($premiumImage);

        return view('admin.premium.edit',compact('products','premiumImage'));
    }

    public function store(Request $request)
    {
       /*  $this->authorize('premium',User::class); */

        $request->validate([
            'file' => 'required|image|mimes:jpg|dimensions:min_width=1920,min_height=600|max:2048',      
        ]);
            
        //$url = Storage::url($request->file('file')->store('premium'));
        $url = $request->file('file')->store('premium');
        if ($request->get('product_id')) {
            $product = Product::find($request->get('product_id'));
        }

        if (auth()->user()->premiumImage) {
            return redirect()->route('admin.premium.create')->with('message','this user already has an image in the slider');
        }else{
            PremiumImage::create([
                'url' => $url,
                'route' => $request->get('product_id') ? url('/products/'.$product->slug) : '',
                'user_id' => auth()->user()->id,
                'product_id' => $request->get('product_id') ? $product->id : null
            ]);

            return redirect()->route('admin.premium.index');
        }

    }

    public function update(Request $request,PremiumImage $premiumImage)
    {
      /*  $this->authorize('premium',User::class); */

        $request->validate([
            'file' => 'required|image|mimes:jpg|dimensions:min_width=1920,min_height=600|max:2048', 
        ]);

       $premiumImage->update($request->all());

       if ($request->file('file')) {
            $url = Storage::put('premium',$request->file('file'));    
            Storage::delete($premiumImage->url);           
       }

       if ($request->get('product_id') != '') {
            $product = Product::find($request->get('product_id'));   
       }

       $premiumImage->update([
            'url' => $request->file('file') ? $url : $premiumImage->url,
            'route' => $request->get('product_id') != '' ?  url('/products/'.$product->slug) : null,
            'product_id' => $request->get('product_id') ? $request->get('product_id'): null,
            'user_id' => auth()->user()->id
        ]);

       return redirect()->route('admin.premium.index');
    }

    public function delete(PremiumImage $premiumImage)
    {
       /*  $this->authorize('premium',User::class); */
        
        Storage::delete($premiumImage->url);

        $premiumImage->delete();

        return back();
    }
}
