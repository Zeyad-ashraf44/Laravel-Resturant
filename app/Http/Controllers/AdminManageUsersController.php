<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUsersController extends Controller
{
    //show all users
    public function viewUsers()
    {
       $users = User::paginate(10); 
return view('admin.users.index', compact('users'));
    }

}
