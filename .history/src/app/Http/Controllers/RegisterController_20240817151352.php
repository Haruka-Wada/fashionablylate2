<?php

namespace 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $request): RegisterViewResponse
    {
        return app(RegisterViewResponse::class);
    }

    public function store(
        Request $request,
        CreatesNewUsers $creator
    ): RegisterResponse {
        if (config('fortify.lowercase_usernames')) {
            $request->merge([
                Fortify::username() => Str::lower($request->{Fortify::username()}),
            ]);
        }

        event(new Registered($user = $creator->create($request->all())));

        return app(RegisterResponse::class);
    }
}
