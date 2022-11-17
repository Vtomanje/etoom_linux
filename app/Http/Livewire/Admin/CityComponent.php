<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\County;
use Livewire\Component;

class CityComponent extends Component
{

    protected $listeners = ['delete'];

    public $city, $counties, $county;

    public $createForm = [
        'name' => '',
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
    ];

    public function mount(City $city){
        $this->city = $city;
        $this->getCounties();
    }

    public function getCounties(){
        $this->counties = County::where('city_id', $this->city->id)->get();
    }

    public function save(){

        $this->validate([
            "createForm.name" => 'required',
        ]);

        $this->city->counties()->create($this->createForm);

        $this->reset('createForm');

        $this->getCounties();

        $this->emit('saved');
    }

    public function edit(County $county){
        $this->county = $county;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $county->name;
    }

    public function update(){
        $this->county->name = $this->editForm['name'];
        $this->county->save();

        $this->reset('editForm');
        $this->getCounties();
    }

    public function delete(County $county){
        $county->delete();
        $this->getCounties();
    }


    public function render()
    {
        return view('livewire.admin.city-component')->layout('layouts.admin');
    }
}