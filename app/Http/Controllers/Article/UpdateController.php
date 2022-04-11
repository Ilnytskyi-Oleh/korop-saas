<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Article $article, Request $request)
    {
        $article->update($request->all());
        return redirect()->route('articles.index');
    }
}
