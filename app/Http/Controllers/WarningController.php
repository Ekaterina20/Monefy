<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarningController extends Controller
{
    public function index () {
        return view('admin.warning');
    }
}
