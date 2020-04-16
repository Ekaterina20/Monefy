<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class ExpensesController extends Controller
{
    public function index()
    {
        $categories=Category::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.expenses.index', compact('categories'));
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

            'name' => 'required|unique:categories',/*имя обязательно и уникально*/
            'icon'=> 'required',
            'color'=>'required',

        ], $messages);

        Category::create([

                'name' => $request['name'],
                'icon'=> $request['icon'],
                'color' => $request ['color'],
                'flag' => 0,
            ]
            );
        return redirect('admin/expenses')->with('status', 'Категория расходов создана успешно');
    }

    public function edit(Category $id) {
        return view('admin.expenses.edit', compact('id'));
    }

    public  function update($id, Request $request) {

        /*проверка валидация*/
        $this->validate($request, [

            'name' => 'required|unique:categories',/*имя обязательно и уникально*/
            'icon'=> 'required',
            'color'=>'required',

        ]);

        $category = Category::find($id);
        $category->update([

            'name'=>$request['name'],
            'icon'=>$request['icon'],
            'color'=> $request['color'],
            'flag' => 0,
        ]);

        return redirect('admin/expenses')->with('status','Категория расходов изменена успешно');
    }
}
