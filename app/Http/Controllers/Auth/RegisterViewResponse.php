<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Contracts\RegisterViewResponse as RegisterViewResponseContract;

class RegisterViewResponse implements RegisterViewResponse
{
    public function toResponse($request)
    {
        return view('auth.register'); // Asegúrate de tener esta vista
    }
}
