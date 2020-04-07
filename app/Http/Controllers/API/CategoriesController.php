<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function list () {

        return response()->json(Category::all(),'200');
    }
}
