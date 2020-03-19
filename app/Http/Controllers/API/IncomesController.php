<?php

namespace App\Http\Controllers\API;

use App\IncomeSite;
use App\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class IncomesController extends Controller
{
    protected $incomes;

    public function __construct()
    {
        $this->incomes = Income::pluck('name', 'id');
    }

    public function index()
    {
        $income_sites = IncomeSite::latest()->get(); /* забирает данные из БД таблицы*/
        return view('api.incomes.index', compact('income_sites'));
    }

    public function create()
    {
        $incomes = $this->incomes;
        return view('api.incomes.create', compact('incomes'));
    }

    public function store(Request $request)
    {
        /*проверка валидация*/
        $this->validate($request, [

            'name'=> 'required|unique:income_sites', /*имя обязательно и уникально*/
            'income_id'=>'required',
            'icon'=>'required',/*иконка обязательна*/
            'color'=>'required',
            'amount'=>'required|numeric',
        ]);

        /*сохранение картинки в папку на сервере*/

        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconPath = $icon->storeAs('expenses', $iconName);
        $icon->move('images/expenses', $iconName);

        IncomeSite::create([

            'name' => $request['name'],
            'income_id' => $request['income_id'],
            'slug' => Str::slug($request['name']),
            'icon'=> $iconPath, /*путь к картинке сохраняем в БД*/
            'color' => $request ['color'],
            'amount' => $request ['amount'],
            'comment' => $request ['comment'],
        ]);
        return redirect('api/incomes')->with('status', 'Доход добавлен успешно');
    }

    public function edit (IncomeSite $income_site)
    {
        $incomes = $this -> incomes;
        return view('api.incomes.edit', compact('income_site', 'incomes'));
    }

    public function update (IncomeSite $income_site, Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'name'=> 'required', /*имя обязательно и уникально*/
            'income_id'=>'required',
           /* 'icon'=>'required',/*иконка обязательна*/
            'amount'=>'required|numeric',
        ]);

        /*сохранение картинки в папку на сервере*/

     /*   $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconPath = $icon->storeAs('expenses', $iconName);
        $icon->move('images/expenses', $iconName);*/

        $income_site->update([

            'name'=>$request['name'],
            'income_id'=>$request['income_id'],
            'slug'=>Str::slug($request['name']),
            /*'icon'=> $iconPath, путь к картинке сохраняем в БД
            'color'=>$request['color'],*/
            'amount'=>$request['amount'],
            'comment' => $request['comment'],

        ]);
        return redirect('api/incomes')->with('status','Доход успешно изменен');
    }

    public function delete (IncomeSite $income_site)
    {
        $income_site->delete();
        return redirect('api/incomes')->with('status','Доход удален успешно');
    }
}
