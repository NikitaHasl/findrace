<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUpdateRequest;
use App\Http\Requests\UserUpdate;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.settings', [
            'user' => $user,
            'genders' => Gender::all(),
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
        if ($user->id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();
        $statusUser = $user->fill($data)->save();
        if ($statusUser) {
            return back()->with('success', 'Изменения прошли успешно!');
        }
        return back()->with('error', 'Что-то пошло не так, попробуйте позже!');
    }

    public function destroy(User $user)
    {
        if ($user->id !== Auth::id()) {
            abort(403);
        }

        $status = $user->delete();
        if ($status) {
            Storage::disk('public')->delete($user->avatar);
            return redirect()->route('index')->with('success', 'Аккаунт успешно удален!');
        }
        return back()->with('error', 'Что-то пошло не так, попробуйте позже!');
    }

    public function updateAvatar(AvatarUpdateRequest $request)
    {
        $newAvatar = $request->file('avatar')->store('avatars', 'public');
        $oldAvatar = null;

        try {
            DB::transaction(function () use ($newAvatar, &$oldAvatar) {
                $user = Auth::user();
                if($user->avatar) {
                    $oldAvatar = $user->avatar;
                }
                $user->avatar = $newAvatar;
                $user->save();
            });
        } catch (\Exception $e) {
            Storage::disk('public')->delete($newAvatar);
            throw $e;
        }

        Storage::disk('public')->delete($oldAvatar);

        return back();
    }

    public function destroyAvatar()
    {
        $oldAvatar = null;

        DB::transaction(function () use (&$oldAvatar) {
            $user = Auth::user();
            if ($user->avatar) {
                $oldAvatar = $user->avatar;
            }
            $user->avatar = null;
            $user->save();
        });

        Storage::disk('public')->delete($oldAvatar);

        return back();
    }

    public function searchForUser(Request $request)
    {
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $firstNameQuery = '%' . $firstName . '%';
        $lastNameQuery = '%' . $lastName . '%';
        $query = User::query();

        if (!empty($firstName)) {
            $query->where('firstname', 'LIKE', $firstNameQuery);
        }
        if (!empty($lastName)) {
            $query->where('lastname', 'LIKE', $lastNameQuery);
        }

        $users = $query->get();
        return view('userSearch.results', [
            'users' => $users
        ]);
    }

    public function userSearchView() {
        return view('userSearch.search');
    }

    public function showProfile(int $id)
    {
        $profile = User::find($id);
        return view('profile.profile', [
            'profile' => $profile
        ]);
    }
}
