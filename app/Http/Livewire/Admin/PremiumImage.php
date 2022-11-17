<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use Livewire\Component;
use App\Models\PremiumImage as preImg;
use Illuminate\Support\Facades\Storage;

class PremiumImage extends Component
{
    protected $listeners = ['render'];

    public $auth_user;
    
    public function deleteImage()
    {
        if ($this->auth_user->premiumImage) {
            // Storage::delete([$image->url]);
            $this->auth_user->premiumImage->delete();     
        }
    }

    public function render()
    {
        return view('livewire.admin.premium-image');
    }
}
