<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\TeacherLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function store(TeacherLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::TEACHER);
    }

    public function destroy(Request $request)
    {
        //هتعمل لج اوت من جاردد اللي اسمها admin
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
