<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Category;

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

        return view('components.frontend.category-list', ['categories'=> $categories,'type'=> $this->type]);
    }
}
