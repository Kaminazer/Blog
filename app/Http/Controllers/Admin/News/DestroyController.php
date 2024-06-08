<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
