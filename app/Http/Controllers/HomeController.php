<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $linksMenu = [];
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            if (strpos($value->getName(), "index") !== false)
                $linksMenu[$value->getName()] = ucfirst($value->getUri());
        }

        return view('home', compact(['linksMenu']));
    }
}
