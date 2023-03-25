<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){
        if(Auth::user()->status == 0){
            return redirect()->route('auth#pendingPage');
        }elseif(Auth::user()->status == 1){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('teacher#homePage');
            }elseif(Auth::user()->role == 'superAdmin'){
                return redirect()->route('super#homePage');
            }else{
                return redirect()->route('student#homePage');
            }
        }else{
            return redirect()->route('auth#rejectPage');
        }
    }
}
