<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExpenseSite;
use App\IncomeSite;
use Carbon\Carbon;

class SiteController extends Controller
{
    public function index(){
        $expense_sites = ExpenseSite::latest()->get();
        $income_sites = IncomeSite::latest()->get();

        /*Расчет текущего баланса пользователя*/
        $total_income = collect($income_sites)->sum('amount');
        $total_expense = collect($expense_sites)->sum('amount');
        $balance = $total_income - $total_expense;

        return view('api.index', compact('expense_sites', 'income_sites', 'balance'));
    }
}
