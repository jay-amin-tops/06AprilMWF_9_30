<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\LoginRedirectTrait;

class HomeController extends Controller
{
    use LoginRedirectTrait;
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
        $user = \Auth::user();
        if ($user->role_id == 1) {
            return redirect('/admin');
        }else{
            return redirect('/');
        }
    }
}
