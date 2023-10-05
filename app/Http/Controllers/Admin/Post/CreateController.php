<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;


class CreateController extends Controller
{
    public function __invoke(Category $category,Tag $tag): View
    {
        return view('admin.post.create', [
            'categories' => $category->all(),
            'tags' => $tag ->all(),
        ]);
    }
}
