<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;


class ShowController extends Controller
{
    public function __invoke(Category $category): View
    {
        return view('admin.category.show', compact('category'));
    }
}
