<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Finance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinancesController extends Controller
{

    public function list (Request $request)
    {
       $financeQuery = Finance::query()
                        ->with('category')
                        ->where('user_id', Auth::id())
                        ->orderByDesc('date');

    /*Фильтры. Если вы хотите определить, присутствует ли значение в запросе и
    не является ли оно пустым, вы можете использовать filled метод*/
       if ($request->filled('date_from')){
           $financeQuery->where('date', '>=', $request->date_from);
       }

       if ($request->filled('date_to')){
            $financeQuery->where('date', '<=', $request->date_to);
       }

       if ($request->filled('categories')) {
            $financeQuery->whereIn('category_id', $request->categories);
       }

       $finance = $financeQuery->paginate();

       return response()->json($finance,'200');
    }


    public function store(Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'category_id'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required|date_format:Y-m-d',
            'comment' => 'nullable',
        ]);

        /*создание фин операции*/

        Finance::create([

            'category_id'=>$request['category_id'],
            'user_id' =>$request->user()->id,
            'amount'=> $request['amount'],
            'date'=> $request['date'],
            'comment'=>$request['comment'],

        ]);

        /*вывод операции с категорией*/
        $finance = Finance::with('category')->get()->last();

        /*поиск созданной операции, отсюда нужен флаг категории*/
        $expense = Category::where('id', $finance->category_id)->first();

        /*проверка флага категории. если 0, то расход. 1-доход*/
        if ($expense->flag == 0) {
            $finance->amount = $finance->amount*(-1);
        }

        $finance->amount;
        $finance->save();

        /*сохранение (обновление) баланса для юзера*/
        $user =  Auth::user();
        $user->balance += $finance->amount;
        $user->save();

        return response()->json([$finance, 'current_balance' =>  $user->balance],'200');
    }


    public function update ( Request $request, $id)
    {
        /*проверка валидация*/

        $this->validate($request, [
            'amount'=>'numeric',
            'date'=>'date_format:Y-m-d',
        ]);

        /*если юзер изменяет чужую операцию, выйдет исключение 403*/
        $finance = Finance::where('user_id',Auth::id())->find($id);

        if ($finance == null) {
            return response()
                ->json ('Forbidden. Record belongs to another user', 403);
        }

        $finance->update($request->all());

        /*поиск созданной операции*/
        $expense = Category::where('id', $finance->category_id)->first();

        /*проверка флага категории. если 0, то расход. 1-доход*/
        if ($expense->flag == 0) {
            $finance->amount = $finance->amount*(-1);
        }

        $finance->amount;
        $finance->save();

        /*расчет баланса авторизованного пользователя после редактир. фин. операции*/
        $balance = Finance::where('user_id', Auth::id())->sum('amount');

        /*сохранение (обновление) баланса для юзера*/
        $user =  Auth::user();
        $user->balance = $balance;
        $user->save();

        return response()->json([$finance, 'current_balance' => $user->balance], 200);
    }


    public function delete ($id)
    {
        /*если юзер изменяет чужую операцию, выйдет исключение 403*/

        $finance = Finance::where('user_id',Auth::id())->find($id);

        if ($finance == null) {
            return response()
                ->json ('Forbidden. Record belongs to another user', 403);
        }

        $finance->delete();

        /*сохранение (обновление) баланса для юзера*/
        $user =  Auth::user();
        $user->balance -= $finance->amount;
        $user->save();

        return response()
            ->json(['current_balance' => $user->balance, 'message'=>'запись удалена'],
                200);
    }
}





