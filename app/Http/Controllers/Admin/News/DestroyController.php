<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(News $new): RedirectResponse
    {
        $new->delete();
        return redirect()->route('new.index');
    }
}
