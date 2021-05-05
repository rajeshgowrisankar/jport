<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        if(Auth::user()->hasRole('administrator')){
            return view('admin.dashboard');
        }else if(Auth::user()->hasRole('candidate')){
            return view('candidate.home');
        }else{
            return view('welcome');
        }
    }

    public function profile(){
        return view('candidate.profile');
    }
}
