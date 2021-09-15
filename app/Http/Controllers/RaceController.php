<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function index()
    {
        return view('races.index', ['races' => Race::with('city')->get()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Race $race)
    {
        return view('races.show', ['race' => $race]);
    }

    public function search(Request $request)
    {
        $string = $request->input('string');
        $arr = explode(' ', mb_strtolower($string)); //Разбиваем строку поиска на слова.
        $words = [];
        /*
         * Все введённые слова будут сокращены, а в конце слова добавлена звёздочка,
         * это нужно для поиска.
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
         * Исключаем все повторения и объединяем в строку. Получаем запрос для поиска подстрок.
         * */
        $words = array_unique($words); //Исключаем все повторения.
        $query = implode(" ", $words);//
        $results = Race::whereRaw(
        // title, description, start, finish - поля, по которым нужно искать
            "MATCH(title, description, start, finish) AGAINST(? IN BOOLEAN MODE)",
            $query)
            ->get();
        return view('races.index', ['races' => $results]);
    }
}
