<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function viewChats($id){
        if($id == 'all'){
            $messages = Chat::join('customers', 'chats.user_id', '=', 'customers.id')
            ->select('customers.id as userId', 'customers.name', 'customers.image', 'chats.created_at','chats.type','chats.message')
            ->orderBy('chats.created_at', 'asc')
            ->get();
            $id = $messages[0]->userId;
        }else{
            $messages = Chat::join('customers', 'chats.user_id', '=', 'customers.id')->where('chats.user_id',$id)
            ->select('customers.id as userId', 'customers.name', 'customers.image', 'chats.created_at','chats.type','chats.message')
            ->orderBy('chats.created_at', 'asc')
            ->get();
        }
      
        return view('admin.chats.conversations', ['customer_id'=>$id,'messages'=>$messages]);
    }
    public function adminSendMsg(Request $request){
        $adminId = Auth::guard('web')->id();
        
        $chat = New Chat();
        
        $chat->admin_id = $adminId;
        $chat->user_id = $request->userId;
        $chat->type = 'admin';
        $chat->message = $request->message;
        $chat->save();
        return response()->json('success');
    }
    
}
