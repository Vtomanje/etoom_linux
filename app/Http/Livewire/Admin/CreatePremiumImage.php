<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class CreatePremiumImage extends Component
{
    protected $listeners = ['refresh','render'];

    public $auth_user;

    public function mount()
    {
        $this->auth_user = auth()->user();
    }

    public function deleteImage()
    {
        if ($this->auth_user->premiumImage) {
            Storage::delete([$this->auth_user->premiumImage->url]);
            $this->auth_user->premiumImage->delete();  

            $this->auth_user = $this->auth_user->fresh();   
        }
    }

    public function refresh()
    {
        $this->auth_user = $this->auth_user->fresh();
    }

    public function render()
    {
        return view('livewire.admin.create-premium-image')->layout('layouts.admin');
    }
}
