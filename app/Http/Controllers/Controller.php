<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;



class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createInv()
    {
        $userName = Auth::check() ? Auth::user()->name : 'Convidado';
        return view('createInv')->with('userName', $userName); 
    }
    
}
