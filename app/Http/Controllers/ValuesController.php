<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Europe/Warsaw');

class ValuesController extends Controller
{
    public function exchangeValues(Request $request)
    {
        $first = (int)$request->get('first');
        $second = (int)$request->get('second');
        DB::insert('insert into history (firstIn, secondIn, created_at, updated_at) values (?, ?, ?, ?)', [$first, $second, now(), now()]);
        $id = DB::getPdo()->lastInsertId();  

        // Zamiana wartości zmiennych
        // Efektywniej byloby zamienic obie wartosci za pomoca zmiennej pomocniczej, ale w tresci zadania jest to zabronione.
        $first = $first - $second;
        $second = $second + $first;
        $first = $second - $first;       
        DB::update('update history set firstOut = ? , secondOut = ?, updated_at = ? where id = ?', [$first, $second, now(), $id]);

        return redirect()->route('showValues');
    }

    public function showValues(Request $request): View
    {
        $sort = $request->get('sort');
        if ($sort !== 'id' && $sort !== 'firstIn' && $sort !== 'secondIn' && $sort !== 'firstOut' && $sort !== 'secondOut' && $sort !== 'created_at' && $sort !== 'updated_at') {
            $sort = 'id';
        }
        
        $records = DB::table('history')->orderBy($sort, 'DESC')->paginate(10)->appends(request()->query());

        return view('welcome', [
            'records' => $records,
            'sort' => $sort
        ]);
    }
}
