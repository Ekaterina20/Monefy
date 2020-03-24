<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{
    public function index() {

        return response()->json(Category::all(),'200');
    }
}
