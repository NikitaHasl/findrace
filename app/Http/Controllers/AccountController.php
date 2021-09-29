<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\User;
use App\Models\Gender;
use App\Models\Registration;
use Exception;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $activeRaces = Registration::select(['registrations_for_race.user_id'])
            ->join('races', 'race_id', '=', 'races.id')
            ->where('user_id', '=', $user->id)
            ->where('status_of_race_id', 1)
            ->count();
        $finishedRaces = Registration::select(['registrations_for_race.user_id'])
            ->join('races', 'race_id', '=', 'races.id')
            ->where('user_id', '=', $user->id)
            ->where('status_of_race_id', 3)
            ->count();
        return view('user.account', [
            'user' => $user,
            'activeRaces' => $activeRaces,
            'finishedRaces' => $finishedRaces,
        ]);
    }

    public function showChangePassword(){
        $user = Auth::user();
        return view('user.changePassword', [
            'user' => $user,
        ]);

    }

    public function showChangeUserData(){
        $user = Auth::user();
        return view('user.changeUserData', [
            'user' => $user,
            'genders' => Gender::all(),
        ]);

    }

    public function showChangeUserAvatar(){
        $user = Auth::user();
        return view('user.changeUserAvatar', [
            'user' => $user,
        ]);

    }

    public function showActiveRaces()
    {
        $user = Auth::user();
        $activeRaces = Race::select(['races.*'])
            ->join('registrations_for_race', 'race_id', '=', 'races.id')
            ->join('cities', 'city_id', '=', 'cities.id')
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
            ->join('cities', 'city_id', '=', 'cities.id')
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
        $status = Registration::where('race_id', '=', $race_id)
            ->where('user_id', '=', $user_id)
            ->delete();
        if ($status) {
            return back()->with('success', 'Вы успешно отписались от забега!');
        } else {
            return back()->with('error', 'Что-то пошло не так');
        }
    }
}
