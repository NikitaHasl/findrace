<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\Registration;

class AccountController extends Controller
{

    function index()
    {
        $user = Auth::user();
        //доработать логи отображения race 
        // $race = Race::select(['*']);
        return view('user.account', [
            'user' => $user,
            // 'race' => $race,
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