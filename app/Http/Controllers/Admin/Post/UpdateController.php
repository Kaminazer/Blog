<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $this->service->update($data, $post);
        return redirect()->route('post.show', $post->id);
    }
}
