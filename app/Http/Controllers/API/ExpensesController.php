<?php

namespace App\Http\Controllers\API;

use App\ExpenseSite;
use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class ExpensesController extends Controller
{
    protected $expenses;

    public function __construct()
    {
        $this->expenses = Expense::pluck('name', 'id');
    }

    public function index()
    {
        $expense_sites = ExpenseSite::latest()->get(); /* забирает данные из БД таблицы*/
        return view('api.expenses.index', compact('expense_sites'));
    }

    public function create()
    {
        $expenses = $this->expenses;
        return view('api.expenses.create', compact('expenses'));
    }

    public function store(Request $request)
    {
        /*проверка валидация*/
        $this->validate($request, [

            'name'=> 'unique:expense_sites', /*имя обязательно и уникально*/
            'expense_id'=>'required',
            'icon'=>'required',/*иконка обязательна*/
            'color'=>'required',
            'amount'=>'required|numeric',
        ]);

        /*сохранение картинки в папку на сервере*/

        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconPath = $icon->storeAs('expenses', $iconName);
        $icon->move('images/expenses', $iconName);

        ExpenseSite::create([

            'name' => $request['name'],
            'expense_id' => $request['expense_id'],
            'slug' => Str::slug($request['name']),
            'icon'=> $iconPath, /*путь к картинке сохраняем в БД*/
            'color' => $request ['color'],
            'amount' => $request ['amount'],
            'comment' => $request ['comment'],
        ]);
        return redirect('api/expenses')->with('status', 'Расход добавлен успешно');
    }


    public function edit (ExpenseSite $expense_site)
    {
        $expenses = $this -> expenses;
        return view('api.expenses.edit', compact('expense_site', 'expenses'));
    }

    public function update (ExpenseSite $expense_site, Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'name'=> 'required', /*имя обязательно и уникально*/
            'expense_id'=>'required',
           /* 'icon'=>'required',/*иконка обязательна*/
            'amount'=>'required|numeric',
        ]);

        /*сохранение картинки в папку на сервере*/

        /*$icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconPath = $icon->storeAs('expenses', $iconName);
        $icon->move('images/expenses', $iconName);*/

        $expense_site->update([

            'name'=>$request['name'],
            'expense_id'=>$request['expense_id'],
            'slug'=>Str::slug($request['name']),
            /*'icon'=> $iconPath, /*путь к картинке сохраняем в БД*/
            /*'color'=>$request['color'],*/
            'amount'=>$request['amount'],
            'comment' => $request['comment'],

        ]);
        return redirect('api/expenses')->with('status','Расход успешно изменен');
    }

    public function delete (ExpenseSite $expense_site)
    {
        $expense_site->delete();
        return redirect('api/expenses')->with('status','Расход удален успешно');
    }

}
