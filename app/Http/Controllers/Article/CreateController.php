<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }
}
