<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class ShowController extends Controller
{
    public function __invoke(News $new)
    {
        return view('admin.new.show', [
            'itemNews' => $new,
        ]);
    }
}
