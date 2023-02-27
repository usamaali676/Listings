<?php

namespace App\Http\Controllers;

use App\Models\AreaWeServe;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\State;

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
        $bus = Business::count();
        $statecount = State::count();
        $citycount = AreaWeServe::count();
        $categorycount = BusinessCategory::count();
        return view('home', compact('bus','statecount','citycount','categorycount'));
    }
    public function login()
    {
        return view('auth.login');
    }
}
