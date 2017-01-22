<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  // New function
  function new(){
    return view('new');
  }

  function create(){
    $input =
    $user = User::create($input);
  }

}
