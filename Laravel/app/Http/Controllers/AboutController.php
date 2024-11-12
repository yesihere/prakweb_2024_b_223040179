<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
  {
    return view('about', ['name' => 'Aldi Pratama', 'title' => 'About Page']);
  }
}
