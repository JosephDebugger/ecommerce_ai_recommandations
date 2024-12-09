<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function viewChats(){
        return view('admin.chats.conversations');
    }
}
