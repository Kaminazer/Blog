<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Comment\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Comment::create($data);
        return redirect()->route('comment.index');
    }
}
