<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Brand;
use App\Models\Image;
use App\Models\County;
use App\Models\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\Subcategory;

use Illuminate\Support\Str;

use App\Models\FillingNumber;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditProduct extends Component
{

    use AuthorizesRequests;

    public $category_id;

    public $product, $categories,$slug;
    public $filling_numbers;
    public $mail,$phone_number;

    public $subcategories = [];

    public $departments,$cities = [];
    public $department_id = "",$city_id = "";

    public $status;
    public $status_id;
    public $zip_code;
    public $address;

    /* redes */

    public $facebook;
    public $twitter;
    public $instagram;
   
    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.name' => 'required',
        'product.mail' => 'required|email',
        'product.phone_number' => 'required|string|min:7|max:10',
        'product.business_type' => 'required|string|min:10|max:15',
        'product.filling_number_id' => 'required',
        'slug' => 'required|unique:products,slug',
        'product.description' => 'required',  
        'product.zip_code' => 'required|string|min:5|max:5',     
        
        /* redes sociales */
       /*  'product.facebook' => 'required',  
        'product.twitter' => 'required',  
        'product.instagram' => 'required',   */

    ];

    protected $listeners = ['refreshProduct', 'delete'];
    

    public function mount(Product $product){
        $this->product = $product;

        $this->filling_numbers = FillingNumber::all();
        
        $this->categories = Category::all();
        $this->category_id = $product->subcategory->category->id;

        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();
        $this->slug = $this->product->slug;     

        /* departments */

        $this->departments = Department::all();

        $this->department_id = $this->product->department_id;
        $this->city_id = $this->product->city_id;        

        $this->cities = City::where('department_id',$this->department_id)->get();       

        /* status */
        $this->status_id = $this->product->status;
        $this->status = [1,2];

        /* redes */

        $this->facebook = $this->product->facebook;
        $this->twitter = $this->product->twitter;
        $this->instagram = $this->product->instagram;

        /* address */
        $this->address = $this->product->address;
    }

    public function refreshProduct(){
        $this->product = $this->product->fresh();
    }

    public function updatedProductName($value){
        $this->slug = Str::slug($value);
    }

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();
              
        $this->product->subcategory_id = "";       
    }

    public function updatedDepartmentId($value)
    {
        $this->reset(['city_id']);

        $this->cities = City::where('department_id',$value)->get();
        $this->counties = County::where('city_id',$this->city_id)->get();
    }  

    public function save(){
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;


        $this->validate($rules);

        $this->product->slug = $this->slug;
        $this->product->department_id = $this->department_id;
        $this->product->city_id = $this->city_id;
       /*  $this->product->zip_code = $this->zip_code; */
        $this->product->address = $this->address;

        $this->product->status = $this->product->status = 2;
        /* redes */
        $this->product->facebook = $this->facebook;
        $this->product->instagram = $this->instagram;
        $this->product->twitter = $this->twitter;

        $this->product->save();

        $this->emit('saved');

        return redirect()->route('admin.posts.index');
    }

    public function deleteImage(Image $image){
        Storage::delete([$image->url]);
        $image->delete();

        $this->product = $this->product->fresh();
    }

    public function delete(){

        $images = $this->product->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }

        $this->product->delete();

        return redirect()->route('admin.index');

    }


    public function render()
    {
        /* $this->authorize('clientStatus',User::class); */

        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}