<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        return view('admin.new.show');
    }
}
