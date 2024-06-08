<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(News $news, UpdateRequest $request):RedirectResponse
    {
        $validatedData = $request->validated();
        $news->update($validatedData);
        return redirect()->route('admin.news.index');
    }
}
