<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\admin\Product;

class trendyProducts extends Component
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
        $trandProducts = Product::select('products.id', 'products.price','products.stock',  'products.name', 'products.discount', 'products.status', 'images.name as image')
        ->leftJoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')->where('products.Tranding','Yes')
        ->paginate(8);
   
        return view('components.frontend.trendy-products', compact('trandProducts'));
    }
}
