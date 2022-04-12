<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        Article::create($request->all() +
            [
                'user_id' => auth()->user()->organization_id ? auth()->user()->organization_id
                                                            : auth()->user()->id,
                'published_at' => Gate::allows('publish-articles')
                && $request->input('published')  ? now() : null,
            ]);
        return redirect()->route('articles.index');
    }
}
