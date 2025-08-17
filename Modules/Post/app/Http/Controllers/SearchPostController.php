<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Post\Models\Post;
use Modules\Post\Services\PostService;
use Illuminate\Support\Str;

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

    public function showposts()
    {
        return view('post::postshows');
    }

    public function postData(PostService $service, Request $request)
    {
        if ($request->ajax()) {
            $posts = $service->latestALL();
            return datatables()->of($posts)
                ->addIndexColumn()
                ->editColumn('id', function ($post) {
                    return '';
                })
                ->editColumn('author', function ($post) {
                    return $post->user->name ?? 'Unknown';
                })
                ->editColumn('content', function ($post) {
                    return Str::limit($post->content, 50, '...');
                })
                ->editColumn('created_at', function ($post) {
                    return $post->created_at->diffForHumans();
                })
                ->addColumn('action', function ($post) {
                    return '
        <button class="btn btn-sm btn-primary editBtn" data-id="' . $post->id . '">Edit</button>
        <button class="btn btn-sm btn-danger deleteBtn" data-id="' . $post->id . '">Delete</button>
    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function array()
    {
        $a = ['apple', 'banana'];
        $b = ['mango', 'orange'];

        $result = array_merge($a, $b);

        print_r($result);



        //--implode array to string
        $array = [
            'Laravel',
            'VueJS',
            'ReactJS',
            'Angular',
            'NodeJS'
        ];
        $string = implode(',', $array);



        //-- json encode convert array to json string
        $arrayData = [
            'name' => 'sss',
            'age' => 20,
            'city' => 'Dhaka'
        ];
        $jsonString = json_encode($arrayData);

        //-- explode string to array
        $string = 'a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z';
        $array = explode(',', $string);
        return response()->json([
            'array' => $array,
            'jsonString' => $jsonString,
        ]);
    }
}
