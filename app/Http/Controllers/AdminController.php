<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
      return $this->middleware('auth');
    }

    public function register(){
      return view('register');
    }

    public function login(){
      return view('login');
    }

    public function dashboard(){
      return view('admin.dashboard');
    }
}
