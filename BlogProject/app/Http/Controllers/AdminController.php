<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Login view
    function login(){
        return view('backend.login'); //since the login file is inside the backend folder
    }
}
