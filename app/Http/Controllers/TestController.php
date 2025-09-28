<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index()
  {
    $user = new User();

    $item = [
      'content' => '本文',
    ];
    return view('index', $item);
  }
}
