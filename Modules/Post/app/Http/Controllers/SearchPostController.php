<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Post\Models\Post;

class SearchPostController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $posts = Post::with('user')->when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
        })
            ->latest()
            ->get();
        return view('post::postlist', compact('posts'))->render();
    }
}
