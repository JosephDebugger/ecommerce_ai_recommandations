<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class accNavbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type = 'profile',public string $user = 'regular')
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.acc-navbar');
    }
}
