<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
<<<<<<< HEAD
    /**
     * Create a new controller instance.
     *
     * @return void
     */
=======
    
>>>>>>> origin/saenz
    public function __construct()
    {
        $this->middleware('auth');
    }

<<<<<<< HEAD
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
=======
>>>>>>> origin/saenz
    public function index()
    {
        return view('home');
    }
}
