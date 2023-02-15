<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('layouts.index_guest');
    }

    public function about(){
        return view('layouts.about');
    }

    public function contacts(){
        return view('layouts.contacts');
    }
}
