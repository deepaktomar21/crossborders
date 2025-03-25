<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function UserList() {
        $users = User::where('role', '!=', 'admin')->get();
        
        return view('admin.user.index', compact('users'));
    }
    
}
