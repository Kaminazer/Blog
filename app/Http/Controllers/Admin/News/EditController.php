<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;


class EditController extends Controller
{
    public function __invoke(News $news):View
    {
        return view('admin.new.edit', compact($news));
    }
}
