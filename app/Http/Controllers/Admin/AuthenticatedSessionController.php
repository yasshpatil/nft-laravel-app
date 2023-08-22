<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function __construct()
    {
       // $this->middleware('guest:admin')->except('logout');
    }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.admin-login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       if(auth()->guard('admin')->attempt(array('email' => $request->input('email'), 'password' => $request->input('password')))){
            return $this->sendLoginResponse($request);
//            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->route('admin-login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        if ($response = $this->authenticated($request, $this->guard('admin')->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->status == 0){
            $this->guard('guard')->logout();
            return redirect()->route('admin-login')->with('error', 'You are banned from this application. Please contact with system Administrator.');
        }

        return redirect()->intended(route('admin.dashboard'));
    }


    public function logout(Request $request)
    {
        $this->guard('guard')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin-login');
    }
}
