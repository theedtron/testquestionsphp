<?php

namespace App\Http\Controllers\Question2;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::query()->paginate(15);
        return view('users.index')->with('users', $users);
    }
}
