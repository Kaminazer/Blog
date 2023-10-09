<?php

namespace App\Http\Controllers\Profile\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->liked_posts;
        return view('profile.liked.index',[
            'posts' => $posts,
        ]);
    }
}
