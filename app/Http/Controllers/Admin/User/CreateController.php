<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.user.create', [
            'roles' => User::getRoles(),
        ]);
    }
}
