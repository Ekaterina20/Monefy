<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Finance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinancesController extends Controller
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
                ->with('category')
                ->orderByDesc('date');

        return response()->json($finance->paginate(),'200');
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

        /*создание фин операции*/
        Finance::create($request->all());

        /*вывод операции с категорией*/
        $finance = Finance::with('category')->get()->last();

        /*поиск созданной операции*/
        $expense = Category::where('id', $finance->category_id)->first();

        /*проверка флага категории. если 0, то расход. 1-доход*/
        if ($expense->flag == 0) {
            $finance->amount = $finance->amount*(-1);
        }
        else {
            $finance->amount;
        }

        $finance->save();

        /*расчет баланса авторизованного пользователя после создания фин. операции*/
        $balance = Finance::where('user_id', Auth::id())->sum('amount');

        /*сохранение (обновление) баланса для юзера*/
        $user =  Auth::user();
        $user->balance = $balance;
        $user->save();

        return response()->json([$finance, 'current_balance' => $balance],'200');
    }

    public function update ( Request $request, $id)
    {

        /*если результат запроса пустой, выйдет исключение 404*/
        $finance = Finance::where('user_id',Auth::id())
            ->findOrFail($id);

        $finance->update($request->all());

        return response()->json($finance, 200);
    }

    public function delete ($id)
    {
        /*если результат запроса пустой, выйдет исключение 404*/
        $finance = Finance::where('user_id',Auth::id())
            ->findOrFail($id);

        $finance->delete();

        /*расчет баланса авторизованного пользователя после создания фин. операции*/
        $balance = Finance::where('user_id', Auth::id())->sum('amount');

        /*сохранение (обновление) баланса для юзера*/
        $user =  Auth::user();
        $user->balance = $balance;
        $user->save();
        
        return response()->json(['message'=>'запись удалена'],  200);
    }
}





