<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class CheckoutController extends Controller
{
    public function __invoke(Plan $plan)
    {
        return view('checkout.index', compact('plan'));
    }
}
