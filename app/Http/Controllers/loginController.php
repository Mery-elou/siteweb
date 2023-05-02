<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function getInscrire(){
        request()->validate([
            'email' =>['required','email'],
            'password' =>['required','min:8',],
        ]);
    }
}
