<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\User;
use App\Models\Registration;
use Exception;

class AccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.account', [
            'user' => Auth::user()
        ]);
    }

    public function showActiveRaces()
    {
        $user = Auth::user();
        //почему-то не работает eloquent, разобраться
        // $races = User::find($user->id)->races();
        $activeRaces = Race::select(['races.*'])
            ->join('registrations_for_race', 'race_id', '=', 'races.id')
            ->where('user_id', '=', $user->id)
            ->where('status_of_race_id', 1)
            ->get();

        return view('user.activeRaces', [
            'user' => $user,
            'races' => $activeRaces,
        ]);
    }

    public function showFinishedRaces()
    {
        $user = Auth::user();

        $finishedRaces = Race::select(['races.*', 'registrations_for_race.*'])
            ->join('registrations_for_race', 'race_id', '=', 'races.id')
            ->where('user_id', '=', $user->id)
            ->where('status_of_race_id', 3)
            ->get();

        return view('user.finishedRaces', [
            'user' => $user,
            'races' => $finishedRaces,
        ]);
    }

    public function subscribe(int $id)
    {
        //простая логика подписки на забег
        $user = Auth::user();

        $reg = new Registration();
        $reg->user_id = $user->id;
        $reg->race_id = $id;
        try {
            $reg->save();
            return back()->with('success', 'Запись прошла успешно!');
        } catch (Exception $e) {
            return back()->with('error', 'Вы уже записаны на данный забег!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(int $race_id)
    {
        $user_id = Auth::user()->id;
        //не совсем правильная логика так как удаляет
        $status = Registration::where('race_id', '=', $race_id, 'and', 'user_id', '=', $user_id)->delete();

        if ($status) {
            return back()->with('success', 'Вы успешно отписались от забега!');
        } else {
            return back()->with('error', 'Что-то пошло не так');
        }
    }
}
