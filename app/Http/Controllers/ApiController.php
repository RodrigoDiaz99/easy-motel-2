<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getUsers(){
        $usuarios=User::select('id','name','email','phone')->get();
        return $usuarios;
    }
}
