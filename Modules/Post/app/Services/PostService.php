<?php

namespace Modules\Post\Services;

use Modules\Post\Models\Post;

class PostService
{
    public function fivePostData()
    {
       return Post::take(5)->get();
    }

    public function latestALL()
    {
       return Post::latest()->get();
    }

    public function latest10PostData()
    {
       return Post::latest()->take(10)->get();
    }

    public function latest20PostData()
    {
       return Post::latest()->take(20)->get();
    }
}
