<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;


class IndexController extends Controller
{
    public function __invoke(Tag $tag): View
    {
        return view('admin.tag.index', [
            'tags' => $tag::all(),
        ]);
    }
}
