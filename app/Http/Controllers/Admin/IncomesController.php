<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class IncomesController extends Controller
{
    public function index (){

        $categories=Category::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.incomes.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.incomes.create');
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
                'flag' => 1,
            ]
        );
        return redirect('admin/incomes')->with('status', 'Категория доходов создана успешно');
    }

    public function edit(Category $id) {
        return view('admin.incomes.edit', compact('id'));
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
            'flag' => 1,
        ]);

        return redirect('admin/incomes')->with('status','Категория доходов изменена успешно');
    }
}
