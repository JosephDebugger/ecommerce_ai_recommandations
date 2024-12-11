<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;

class chatsNavbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public function __construct( $user)
    {
       $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $chats = Chat::distinct('user_id')
        // ->join('customers', 'chats.user_id', 'customers.id')
        // ->select('customers.id as userId','customers.name','customers.image','chats.created_at','chats.message')->orderBy('chats.created_at', 'desc')->get();
        // dd($chats);
        $chats = Chat::join('customers', 'chats.user_id', '=', 'customers.id')
            ->select('customers.id as userId', 'customers.name', 'customers.image', DB::raw('MAX(chats.created_at) as lastMessageTime'), DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(chats.message ORDER BY chats.created_at DESC), ",", 1) as lastMessage'))
            ->groupBy('chats.user_id', 'customers.id', 'customers.name', 'customers.image')
            ->orderBy('lastMessageTime', 'desc')
            ->get();

        return view('components.admin.chats-navbar', ['chats' => $chats]);
    }
}
