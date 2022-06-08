<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;

class UserController extends Controller
{
    public function create_request(Request $request){
      
        Requests::create($request->all());
        
    }
}
