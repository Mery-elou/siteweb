<?php

namespace App\Http\Controllers;

use index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EspaceClientController extends Controller
{

    public function index(){

        return view('espace.cliennt.Espace_Client');
    }

}
