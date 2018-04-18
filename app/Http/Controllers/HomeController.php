<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (Auth::user()->role_id == 1) {
            $title_db = \App\Models\Administration\Parameters::where("group", "main_title")->first();
            $title = "Trusted";
            if ($title_db != null) {
                $title = $title_db->value;
            }
            Session::put('title', $title);
            return view('home');
        } else {
            redirect("accessPerson");
        }
    }

}
