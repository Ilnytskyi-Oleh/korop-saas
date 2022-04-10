<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $plans = Plan::all();
        return view('billing.index', compact('plans'));
    }
}
