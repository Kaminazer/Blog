<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class DestroyController extends Controller
{
    public function __invoke(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
