<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::byActivationColumns($request->email, $request->token)->firstOrFail();

        $user->update([
            'active' => 1,
            'activation_token' => null
        ]);

        Auth::loginUsingId($user->id);

        return redirect()->route('member')->withSuccess('Activated! You\'re now signed in.');
    }
}
