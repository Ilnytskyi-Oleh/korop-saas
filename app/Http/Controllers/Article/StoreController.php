<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        Article::create($request->all() + ['user_id' => auth()->user()->id]);
        return redirect()->route('articles.index');
    }
}
