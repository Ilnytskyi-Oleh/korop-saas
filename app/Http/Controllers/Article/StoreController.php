<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        Article::create($request->all() +
            [
                'user_id' => auth()->user()->id,
                'published_at' => (auth()->user()->is_publisher || auth()->user()->is_admin)
                && $request->input('published')  ? now() : null,
            ]);
        return redirect()->route('articles.index');
    }
}
