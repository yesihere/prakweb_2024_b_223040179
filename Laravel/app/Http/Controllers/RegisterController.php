<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function index()
  {
    return view("register", ['title' => 'Register Page']);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:50',
      'username' => 'required|min:3|max:10|unique:users',
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:5|max:255',
      // 'confirmPassword' => 'required|min:5|max:255',
    ]);

    User::create($validatedData);

    return redirect('/login')->with('success', 'Registration successfull, Please login!');
  }
}
