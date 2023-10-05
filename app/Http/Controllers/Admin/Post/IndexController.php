<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class IndexController extends BaseController
{
    public function __invoke(Post $post): View
    {
        return view('admin.post.index', [
            'posts' => $post::all(),
        ]);
    }
}
