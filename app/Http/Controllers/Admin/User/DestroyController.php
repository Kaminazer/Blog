<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
