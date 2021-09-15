<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\User;
use App\Models\Registration;

class AccountController extends Controller
{

    function index()
    {
        $user = Auth::user();
        //почему-то не работает eloquent, разобраться
        // $races = User::find($user->id)->races();

        $races = Race::select(['races.*'])
            ->join('registrations_for_race', 'race_id', '=', 'races.id')
            ->where('user_id', '=', $user->id)
            ->get();

        return view('user.account', [
            'user' => $user,
            'races' => $races,
        ]);
    }

    function subscribe(int $id){

        //простая логика подписки на забег 
        $user = Auth::user();
        $reg = new Registration();
        $reg->user_id = $user->id;
        $reg->race_id = $id;
        $reg->status_of_race_id = 1;
        $status = $reg->save();

        if ($status) {

            return redirect()->route('account')->with('success', 'Вы успешно записались на забег');
        }
        return back()->with('error', 'Что-то пошло не так!');

    }

}