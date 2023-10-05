<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            $tags_id = $data['tags_id'];
            unset($data['tags_id']);

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::create($data);
            $post->tags()->attach($tags_id);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
        return redirect()->route('post.show', $post->id);
    }
}
