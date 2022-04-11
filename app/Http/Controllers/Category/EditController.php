<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;



class EditController extends Controller
{
    public function __invoke( Category $category)
    {
        $categories = Category::all();
        return view('categories.edit', compact('category','categories'));
    }
}
