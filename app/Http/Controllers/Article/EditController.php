<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke( Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article','categories'));
    }
}
