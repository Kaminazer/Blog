<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\View\View;
class IndexController extends Controller
{
    public function __invoke(User $user): View
    {
        return view('admin.user.index', [
            'users' => $user::all(),
        ]);
    }
}
