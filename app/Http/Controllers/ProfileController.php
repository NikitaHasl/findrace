<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile(int $id)
    {
        $profile = User::where('id', $id)->get();
        return view('profile.profile', [
            'profile' => $profile
        ]);
    }
}
