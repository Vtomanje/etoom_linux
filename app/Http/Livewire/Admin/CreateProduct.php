<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\County;
use App\Models\Product;
use Livewire\Component;
use App\Models\Business;
use App\Models\Category;
use App\Models\Department;
use App\Models\Subcategory;

use Illuminate\Support\Str;
use App\Models\FillingNumber;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateProduct extends Component
{
    use AuthorizesRequests;

    // ! $cities = [] , $counties = [] deben iniciar como un arreglo vacío, hasta que no seleccione un departamento no se va a llenar esta informacion, de lo contrario le dara error

    public $categories, $subcategories = [], $brands = [], $departments, $cities = [] , $counties = [];
    public $category_id = "", $subcategory_id = "", $brand_id = "", $department_id = "", $city_id = "",$filling_number_id = "";
    public $name,$phone_number,$mail, $slug, $description, $price,$business_type,$zip_code,$address;

    /* redes */
    public $facebook,$instagram,$twitter;

    public $object;

    /* users (only admin) */

    public $users = [];
    public $user_id = "";

    /* auth user */
    
    public $auth_user;

    protected $rules = [
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required|string|max:50',
        'phone_number' => 'required|string|min:7|max:10',
        'mail' => 'required|email',
        'slug' => 'required|unique:products',
        'description' => 'required',
        'business_type' => 'required|string|min:10|max:15',
        'filling_number_id' => 'required',
        'department_id' => 'required',
        'city_id' => 'required',
        'zip_code' => 'required|string|min:5|max:5',       
        /* redes */
        /* 'facebook' => 'required',
        'twitter' => 'required',
        'instagram' => 'required', */

    ];

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->reset(['subcategory_id']);
    }

    public function updatedDepartmentId($value){
        $this->cities = City::where('department_id', $value)->get();      

        $this->reset([ 'city_id']);
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    /* public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    } */

    public function mount(){

        // ! estas son tablas que no dependen de ninguna,por tanto puede traerse la informacion usando el metodo all()
        $this->categories = Category::all();
        $this->departments = Department::all();
        $this->filling_numbers = FillingNumber::all();

        // ! estas dos lineas no deben ir en este metodo, pues no debemos llenar el select con las ciudades y condados cuando aún no hemos seleccionado un departamento que es lo primero deberiamos hacer
       /*  $this->cities = City::all();
        $this->counties = County::all(); */


        /* admin */

        $this->users = User::all();
        $this->auth_user = auth()->user();

    }


    public function save(){

        $rules = $this->rules;

        /* if (User::find($this->auth_user->id)->hasRole('admin')) {
            $rules['user_id'];
        } */

        $this->validate($rules);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->phone_number = $this->phone_number;
        $product->mail = $this->mail;

        // ! price no está en el formulario y es obligatorio, en las migraciones tuve que dejarlo en nullable()
        $product->subcategory_id = $this->subcategory_id;
        $product->department_id = $this->department_id;
        $product->city_id = $this->city_id;
        $product->address = $this->address;
        $product->zip_code = $this->zip_code;
        $product->filling_number_id = $this->filling_number_id;
        $product->business_type = $this->business_type;

        // ! linea agregada

        if (User::find($this->auth_user->id)->hasRole('admin')) {
            $product->user_id = $this->user_id;
        }else{
            $product->user_id = auth()->user()->id;
        }

        /* redes sociales */
        $product->facebook = $this->facebook;
        $product->instagram = $this->instagram;
        $product->twitter = $this->twitter;

        $product->save();

        //return $product;

        return redirect()->route('admin.products.edit',$product);   
    }

    public function render()
    {
        /* $this->authorize('clientStatus',User::class); */

        return view('livewire.admin.create-product')->layout('layouts.admin');
    }
}