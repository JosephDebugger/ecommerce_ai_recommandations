<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\admin\sale\Sale;
use App\Models\admin\Band;

class DashController extends Controller
{
    public function index(){
        $customers = Customer::count();
        $bands = Band::count();
        $sales = Sale::count();
        $bounced = ($sales /100)* Sale::where('status','cancel')->count();

        return view('admin.dashboard',['customers'=>$customers,'bands'=>$bands,'orders'=>$sales,'bounced'=>$bounced]);
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
