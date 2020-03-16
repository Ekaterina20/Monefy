<?php

namespace App\Http\Controllers\Admin;

use App\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class IncomesController extends Controller
{
    public function index (){
        $incomes=Income::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.incomes.index', compact('incomes'));
    }
    public function create ()
    {
        return view('admin.incomes.create');
    }
    public function store(Request $request)
    {
        $messages = [

            'unique' => 'Такая категория доходов уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

            'name' => 'required|unique:incomes', /*имя обязательно и уникально*/
            'icon'=> 'required',
            'color'=>'required'

        ], $messages);

        /*сохранение картинки в папку на сервере*/

        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconPath = $icon->storeAs('expenses', $iconName);

        Income::create([

            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'icon'=> $iconPath, /*путь к картинке сохраняем в БД*/
            'color' => $request ['color']
        ]);
        return redirect('admin/incomes')->with('status', 'Категория доходов создана успешно');
    }
}