<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class DestroyController extends Controller
{
    public function __invoke(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
