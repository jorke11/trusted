<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use \App\Models\Administration\Parameters;

class CustomerController extends Controller {

    public function index() {
        $param_title = Parameters::where("group", "main_title")->first();
        $title = $param_title->value;
        
        return view("Administration.customer.init", compact("title"));
    }

}
