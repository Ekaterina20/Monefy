<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ExpensesController extends Controller
{
    public function index()
    {
        $expenses=Expense::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('admin.expenses.create');
    }

    public function store(Request $request)
    {
        $messages = [

            'unique' => 'Такая категория уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

            'name' => 'required|unique:expenses',/*имя обязательно и уникально*/
            'icon'=> 'required',
            'color'=>'required'

        ], $messages);

        /*сохранение картинки в папку на сервере*/

        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconPath = $icon->storeAs('expenses', $iconName);
        $icon->move('images/expenses', $iconName);
        
        Expense::create([

            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'icon'=> $iconPath, /*путь к картинке сохраняем в БД*/
            'color' => $request ['color']
        ]);
        return redirect('admin/expenses')->with('status', 'Категория расходов создана успешно');
    }
}
