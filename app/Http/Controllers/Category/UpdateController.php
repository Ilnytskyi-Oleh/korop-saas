<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Category $category, Request $request)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }
}
