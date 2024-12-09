<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Chat;

class chatsNavbar extends Component
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
        $chats = Chat::distinct('user_id')
        ->join('customers', 'chats.user_id', 'customers.id')
        ->select('customers.id as userId','customers.name','customers.image','chats.created_at','chats.message')->orderBy('chats.created_at', 'desc')->get();
       // dd($chats);
       

        return view('components.admin.chats-navbar', ['chats'=>$chats]); 
    }
}
