<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Service\PostService;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, PostService $service): RedirectResponse
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }
}
