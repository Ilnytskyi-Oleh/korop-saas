<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Article $article, Request $request)
    {
        $data = $request->all();
        if(auth()->user()->is_admin || auth()->user()->is_publisher){
            $data['published_at'] = $request->input('published') ? now() : null;
        }
        $article->update($data);
        return redirect()->route('articles.index');
    }
}
