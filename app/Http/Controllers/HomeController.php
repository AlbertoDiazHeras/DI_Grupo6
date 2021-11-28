<?php

namespace almagest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use almagest\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('usuarios.inicio');
    }

    public function verify($code)
    {
        $user = User::where('code', $code)->first();
    
        if (! $user)
            return redirect('/');
    
        $user->email_confirmed = 1;
        $user->code = null;
        $user->save();
    
        return redirect('/login');
    }

    public function register(Request $request)
{
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
}


}
