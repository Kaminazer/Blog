<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $password = $data['password'];
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event(new Registered($user));
        Mail::to($data['email'])->send(new PasswordMail($user, $password));
        return redirect()->route('user.index');
    }
}
