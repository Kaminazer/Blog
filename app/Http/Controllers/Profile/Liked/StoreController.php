<?php

namespace App\Http\Controllers\Profile\Liked;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(Post $post): RedirectResponse
    {
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
