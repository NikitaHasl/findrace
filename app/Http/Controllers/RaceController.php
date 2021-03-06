<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRaceRequest;
use App\Models\City;
use App\Models\Race;
use App\Models\RaceStatus;
use App\Models\RaceType;
use App\Models\Registration;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasRole:' . Role::ORGANIZER)->only([
            'create',
            'store',
            'updateResult',
            'addResult',
            'listParticipants',
            'markAsDone',
        ]);
    }

    public function index(Request $request)
    {
        $cities = City::all();
        $types = DB::table('types_of_race')->select(['id', 'type_of_race'])->get();

        if (count($request->all()) > 0) {
            // get filters
            $filter = $request->all();

            // get cityIDs
            $cityIDs = array_filter($filter, function ($data) {
                $word = 'city';
                return strpos($data, $word);
            }, ARRAY_FILTER_USE_KEY);

            // get typeIDs
            $typeIDs = array_filter($filter, function ($data) {
                $word = 'type';
                return strpos($data, $word);
            }, ARRAY_FILTER_USE_KEY);

            // retrieve data from DB
            $query = Race::query();

            // if code has cities, add to query
            if (!empty($cityIDs)) {
                $query->whereIn('city_id', $cityIDs);
            }

            // if code has types, add to query
            if (!empty($typeIDs)) {
                $query->whereIn('type_of_race_id', $typeIDs);
            }

            // execute query
            $data = $query->get();
            return view('races.index', [
                'races' => $data,
                'cities' => $cities,
                'types' => $types
            ]);
        } else {
            return view('races.index', [
                'races' => Race::with('city')->get(),
                'cities' => $cities,
                'types' => $types
            ]);
        }
    }

    public function create()
    {
        return view('races.create', [
            'cities' => City::all(),
            'raceStatuses' => RaceStatus::all(),
            'raceTypes' => RaceType::all(),
        ]);
    }

    public function store(StoreRaceRequest $request)
    {
        $picture = $request->file('picture')->store('race_pictures', 'public');

        try {
            Race::create([
                'title' => $request->post('title'),
                'city_id' => (int)$request->post('city'),
                'type_of_race_id' => (int)$request->post('type'),
                'status_of_race_id' => 1,
                'picture' => $picture,
                'date' => $request->post('date') . ' ' . $request->post('time'),
                'distance' => (int)$request->post('distance'),
                'description' => $request->post('description'),
                'start' => $request->post('start'),
                'finish' => $request->post('finish'),
                'organizer_id' => Auth::id(),
            ]);
        } catch(\Exception $e) {
            Storage::disk('public')->delete($picture);
            throw $e;
        }

        return redirect()->route('index');
    }

    public function show(Race $race)
    {
        $subscribers = new Collection();
        if (Auth::user() && Auth::user()->hasRole(Role::USER)){
            $subscribers = Registration::where('race_id', '=', $race->id)->pluck('user_id');
        }
        return view('races.show', [
            'race' => $race,
            'subscribers' => $subscribers,
        ]);
    }

    public function search(Request $request)
    {
        $string = $request->input('string');
        $arr = explode(' ', mb_strtolower($string)); //?????????????????? ???????????? ???????????? ???? ??????????.
        $words = [];
        /*
         * ?????? ?????????????????? ?????????? ?????????? ??????????????????, ?? ?? ?????????? ?????????? ?????????????????? ??????????????????,
         * ?????? ?????????? ?????? ????????????.
         *
         * */
        foreach ($arr as $word) {
            $len = mb_strlen($word);
            switch ($len) {
                case 0:
                    break;
                case ($len <= 3):
                    $words[] = $word . "*";
                    break;
                case ($len > 3 && $len <= 6):
                    $words[] = mb_substr($word, 0, -1) . "*";
                    break;
                case ($len > 6 && $len <= 9):
                    $words[] = mb_substr($word, 0, -2) . "*";
                    break;
                case ($len > 9):
                    $words[] = mb_substr($word, 0, -3) . "*";
                    break;
            }
        }
        /*
         * ?????????????????? ?????? ???????????????????? ?? ???????????????????? ?? ????????????. ???????????????? ???????????? ?????? ???????????? ????????????????.
         * */
        $words = array_unique($words); //?????????????????? ?????? ????????????????????.
        $query = implode(" ", $words); //?????????????????? ?????? ?? ????????????.
        $results = Race::select('races.*')
            ->join('cities', 'races.city_id', '=', 'cities.id')
            ->join('types_of_race', 'races.type_of_race_id', '=', 'types_of_race.id')
            ->whereRaw(
            // ?? ?????????????? races ???????? ???? ?????????? title, description, start, finish...
                "MATCH(title, description, start, finish) AGAINST(? IN BOOLEAN MODE)",
                $query
            )
            // ???? ???????? city...
            ->orWhereRaw(
                "MATCH(city_title) AGAINST(? IN BOOLEAN MODE)",
                $query
            )
            // ?? ???? ???????? type_of_race.
            ->orWhereRaw(
                "MATCH(type_of_race) AGAINST(? IN BOOLEAN MODE)",
                $query
            )
            ->get();
        return view('races.index', [
            'races' => $results,
            'cities' => City::all(),
            'types' => DB::table('types_of_race')->select(['id', 'type_of_race'])->get(),
        ]);
    }

    public function addResults(Request $request, int $id)
    {
        $race = Race::with('users')->find($id);
        if (Auth::id() !== $race->organizer_id) {
            abort(403);
        }

        $params = ['race' => $race];
        if ($request->has('user')) {
            $params['user_id'] = $request->input('user');
        }

        return view('races.addResults', $params);
    }

    public function updateResult(Request $request, Race $race)
    {
        try {
            if (Auth::id() !== $race->organizer_id) {
                abort(403);
            }

            $result = Registration::where('user_id', '=', $request->input('user_id'))
                ->where('race_id', '=', $race->id)
                ->update([
                    'finish_time' => $request->input('finish_time'),
                    'place' => $request->input('place')
                ]);
        }catch (\PDOException $exception){
            if ($exception->getCode() == 23000){
                return back()->with('error', '?????????? ?????????? ?????? ?????????????????????? ?????????????? ??????????????????!');
            }
        }
        return back()->with('success', '???????????????????? ?????????????????? ??????????????.');
    }

    public function listParticipants(Race $race)
    {
        if (Auth::id() !== $race->organizer_id) {
            abort(403);
        }

        $participants = User::select(['*'])
            ->join('registrations_for_race', 'user_id', '=', 'users.id')
            ->where('race_id', '=', $race->id)
            ->get();

        return view('races.listParticipants', [
            'race' => $race,
            'participants' => $participants,
        ]);
    }

    public function markAsDone(Race $race) {
        if (Auth::id() !== $race->organizer_id) {
            abort(403);
        }

        $race->status_of_race_id = 3;
        $race->save();

        return redirect()->route('account.races');
    }
}
