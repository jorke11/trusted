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

//        dd(\App\Models\Administration\Stakeholder::all());
        $row = \App\Models\Administration\Stakeholder::find(Auth::user()->stakeholder_id);
        Session::put('logo', $row->logo);

        $title = "Trusted";
        $logo = "";

        if ($row->title_main != null) {
            $title = $row->title_main;
        }
        if ($row->logo != null) {
            $logo = $row->thumbnail;
        }

        Session::put('title', $title);
        Session::put('logo', $logo);


        if (Auth::user()->role_id == 3) {
            return redirect("accessPerson");
        } else {


            return view('home');
        }
    }

}
