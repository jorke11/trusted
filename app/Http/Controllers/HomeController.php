<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title_db = \App\Models\Administration\Parameters::where("group", "main_title")->first();
        $title = "Trusted";
        if ($title_db != null) {
            $title = $title_db->value;
        }
        Session::put('title', $title->value);
        return view('home');
    }

}
