<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function index(){
        $categories=Category::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.index', compact('categories'));
    }
}
