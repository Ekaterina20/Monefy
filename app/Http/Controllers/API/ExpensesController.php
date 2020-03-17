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
        $messages =[

            'unique' => 'Такой продукт уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

            'name'=> 'required|unique:expense_sites', /*имя обязательно и уникально*/
            'expense_id'=>'required',
            'icon'=>'required',/*иконка обязательна*/
            'color'=>'required',
            'amount'=>'required|numeric',
        ], $messages);

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
}
