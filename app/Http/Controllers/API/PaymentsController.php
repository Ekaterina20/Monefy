<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Finance;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{

    public function index()
    {
       /* if (request()->has('date')){
            $finance = Finance::select('id', 'amount', 'comment','date','category_id')
                ->with(['category' => function($query){
                    $query->select('id', 'name', 'icon');}])
                ->where('date', request('date'))
                ->orderByDesc('date')
                ->paginate();
        } else {*/

            $finance = Finance::select('id', 'amount', 'comment', 'date', 'category_id')
                ->with(['category' => function ($query) {
                    $query->select('id', 'name', 'icon');}])
                ->orderByDesc('date')
                ->paginate();
        /*}*/

        return response()->json($finance,'200');
    }

    public function store(Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'category_id'=>'required',
            'user_id'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required|date_format:Y-m-d',
            'comment' => 'nullable',
        ]);

        Finance::create($request->all());

        $finance = Finance::
                            with(['category' => function ($query) {
                                    $query->select('id', 'name', 'icon');}])
                            ->get()
                            ->last();

        return response()->json($finance,'200');
    }

    public function update (Finance $finance, Request $request)
    {
        $finance->update($request->all());

        return response()->json($finance, 200);
    }

    public function delete (Finance $finance)
    {
        $finance->delete();
        return response()->json(null, 200);
    }
}





