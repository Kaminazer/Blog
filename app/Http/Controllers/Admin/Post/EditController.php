<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class EditController extends BaseController
{
    public function __invoke(Post $post, Tag $tag, Category $category): View
    {
       return view('admin.post.edit', [
           'post' => $post,
           'tags' => $tag->all(),
           'categories' => $category->all(),
       ]);
    }
}
