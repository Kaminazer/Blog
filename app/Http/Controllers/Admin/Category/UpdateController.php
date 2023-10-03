<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category): RedirectResponse
    {
       $data = $request->validated();
        $category->update($data);
        return redirect()->route('category.show', $category->id);
    }
}
