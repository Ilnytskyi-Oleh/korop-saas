<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $articles = Article::with('user')->get();
        return view('articles.index', compact('articles'));
    }
}
