<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

use App\Models\admin\Product;

class featuredProducts extends Component
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
        $trandProducts = Product::select('products.id', 'products.price', 'products.name', 'products.stock', 'products.discount', 'products.status', 'images.name as image')
        ->leftJoin('images', 'products.id', 'images.product_id')->where('images.type', 'Default')->where('products.featured','Yes')
        ->paginate(8);
        return view('components.frontend.featured-products', compact('trandProducts'));
    }
}
