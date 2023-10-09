<?php

namespace App\Http\Controllers\Profile\Main;

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
        $likedPostCount = auth()->user()->likedPosts->count();
        $commentsCount = auth()->user()->comments->count();
        return view('profile.main.index', compact('likedPostCount', 'commentsCount'));
    }
}
