<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag): RedirectResponse
    {
       $data = $request->validated();
        $tag->update($data);
        return redirect()->route('tag.show', $tag->id);
    }
}
