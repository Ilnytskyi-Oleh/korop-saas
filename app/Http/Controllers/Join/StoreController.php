<?php

namespace App\Http\Controllers\Join;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        auth()->user()->organizations()->attach($request->input('organization_id'));
        return redirect()->route('home');
    }
}
