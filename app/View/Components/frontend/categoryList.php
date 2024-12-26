<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\admin\settings\Category;
use App\Models\admin\settings\SubCategory;

class categoryList extends Component
{
    /**
     * Create a new component instance.
     */

     public string $type;
    public function __construct($type)
    {
        //
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::where('type',$this->type)->get();
        $subCategories = SubCategory::get();
        // dd($subCategories);

        return view('components.frontend.category-list', ['categories'=> $categories,'subCategories'=> $subCategories,'type'=> $this->type]);
    }
}
