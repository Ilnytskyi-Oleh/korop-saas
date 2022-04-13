<?php

namespace App\Http\Controllers\Join;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __invoke(Request $request)
    {
        $organization = User::findOrFail( request('organization_id'));
        session(['organization_id'=>$organization->id,'organization_name' => $organization->name]);
        return back();
    }
}
