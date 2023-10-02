<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;


class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.category.index');
    }
}
