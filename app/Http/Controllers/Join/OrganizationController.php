<?php

namespace App\Http\Controllers\Join;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    public function __invoke(Request $request)
    {
        $organization = User::findOrFail( request('organization_id'));
        $role = DB::table('organization_user')->where('organization_id', $organization->id)
        ->where('user_id', auth()->user()->id)->first();
        session(['organization_id'=>$organization->id,'organization_name' => $organization->name,
            'organization_role_id' => $role->role_id,
        ]);
        return back();
    }
}
