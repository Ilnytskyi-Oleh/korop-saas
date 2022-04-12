<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UpdateController extends Controller
{
    public function __invoke(Article $article, Request $request)
    {
        $this->authorize('update', $article);

        $data = $request->all();
        if(Gate::allows('publish-articles')){
            $data['published_at'] = $request->input('published') ? now() : null;
        }
        $article->update($data);
        return redirect()->route('articles.index');
    }
}
