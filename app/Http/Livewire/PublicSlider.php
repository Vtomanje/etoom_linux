<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PremiumImage;
use App\Models\PremiumTestImage;

class PublicSlider extends Component
{   
    public function emptySlide()
    {
        $this->emitTo('modal','emptySlide');
    }

    public function render()
    {
        $premiumImages = PremiumImage::all();
        $premiumTestImages = PremiumTestImage::all();   

        $condicion = "";
        
        if ($premiumImages->count() < 5 && $premiumTestImages->count() >= 3) {
            $mergePremium = $premiumImages->concat($premiumTestImages);
            $condicion = "se cumple if";
        }elseif($premiumImages->count() >= 5 && $premiumImages->count() < 10){
            $mergePremium = $premiumImages->concat($premiumTestImages->take(2));
            $condicion = "se cumple primer else if";

        }elseif($premiumImages->count() >= 5 && $premiumImages->count() >= 10){
            $mergePremium = $premiumImages->concat($premiumTestImages->take(1));
            $condicion = "se cumple segundo else if";

        }else{
            $mergePremium = $premiumImages->concat($premiumTestImages);
            $condicion = "se cumple else";
        }         

        return view('livewire.public-slider',compact('mergePremium','condicion','premiumImages','premiumTestImages'));
    }
}
