<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class ShowController
{
    public function __invoke(Post $post): View
    {
        $post->created_at = Carbon::parse($post->created_at);
        $post->updated_at = Carbon::parse($post->updated_at);
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get()->take(3);
        $comments = $post->comments;

        return view('post.show', compact('post', 'relatedPosts', 'comments'));
    }
}
