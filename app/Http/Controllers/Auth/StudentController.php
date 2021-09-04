<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\StudentLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function store(StudentLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::STUDENT);
    }

    public function destroy(Request $request)
    {
        //هتعمل لج اوت من جاردد اللي اسمها admin
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
