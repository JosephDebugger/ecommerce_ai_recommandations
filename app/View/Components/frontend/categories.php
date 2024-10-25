<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use App\Models\admin\settings\Brand;

class categories extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['categories'] = Category::latest()->get();
        $data['brands'] = Brand::latest()->get();
        return view('components.frontend.categories',$data);
    }
}
