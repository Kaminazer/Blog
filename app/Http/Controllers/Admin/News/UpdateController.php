<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(News $new, UpdateRequest $request):RedirectResponse
    {
        $validatedData = $request->validated();
        $validateTag = $validatedData['tags'];
        unset($validatedData['tags']);
        $validatedData['image'] = Storage::disk('public')->put('/images', $validatedData['image']);

        $previousTags = $new->tags->toArray();

        $result = $new->update($validatedData);
        return redirect()->route('admin.new.index');
    }
}
