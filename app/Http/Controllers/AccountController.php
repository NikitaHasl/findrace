<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    function index()
    {
        $user = Auth::user();
        // $race = нужна модель race  
        return view('account.index', [
            'user' => $user
        ]);
    }

}
