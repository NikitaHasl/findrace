<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.settings', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, User $user)
    {
        $data = $request->validated();
        $statusUser = $user->fill($data)->save();
        if ($statusUser) {
            return back()->with('success', 'Изменения прошли успешно!');
        }
        return back()->with('error', 'Что-то пошло не так, попробуйте позже!');
    }

    public function delete($id)
    {
        $status = User::where('id', '=', $id)->delete();
        if ($status) {
            return redirect()->route('index')->with('success', 'Аккаунт успешно удален!');
        }
        return back()->with('error', 'Что-то пошло не так, попробуйте позже!');
    }
}
