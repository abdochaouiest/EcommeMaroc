<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatiqueController extends Controller
{
    public function dashboardAdmin(){
        return view('dashboard.admin');
    }
    public function dashboardUser(){
        return view('dashboard.user');
    }
    public function index(){
        return view('index.home');
    }
}
