<?php

namespace App\Http\Controllers\Profile\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke($post)
    {
        auth()->user()->liked_posts()->detach($post);
        return redirect()->route('liked.index');
    }
}
