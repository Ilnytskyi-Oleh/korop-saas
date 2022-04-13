<?php

namespace App\Http\Controllers\Join;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $organization = User::findOrFail( request('organization_id'));
        return view('join.create', compact('organization'));
    }
}
