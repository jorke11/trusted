<?php

namespace App\Http\Controllers\Operation;

use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Operation\Access;
use App\Models\Administration\Parameters;
use File;

class AccessController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }
    
    public function index() {
        $arl = Parameters::where("group", "arl")->get();
        $eps = Parameters::where("group", "eps")->get();
        $dependency = Parameters::where("group", "dependency")->get();
        $element = Parameters::where("group", "element")->get();
        $mark = Parameters::where("group", "mark")->get();
        return view("operation.access.index", compact("arl", "eps", "dependency","element","mark"));
    }

    public function store(Request $req) {
        $in = $req->all();

        $path = public_path() . "/images/" . date("Y-m-d");
        $pathsys = "images/" . date("Y-m-d");

        $res = File::makeDirectory($path, $mode = 0777, true, true);
        $manager = new ImageManager(array('driver' => 'imagick'));

        $image = $manager->make($in["img"])->widen(400);
        $pathsys .= "/" . $in["document"] . ".jpg";
        $path .= "/" . $in["document"] . ".jpg";
//        echo $path;exit;

        $in["img"] = url($pathsys);
        $in["birth_date"] = date("Y-m-d", strtotime($in["birth_date"]));
        $in["status_id"] = 1;

        $image->save($path);

        $row = Access::create($in);

        return response()->json(["status" => true, "row" => $row]);
    }

    public function update($document) {
        $row = Access::where("document", $document)->where("status_id", 1)->first();

        if ($row != null) {
            $row->status_id = 2;
            $row->save();
            return response()->json(["status" => true, "row" => $row]);
        } else {
            return response()->json(["status" => false, "msg" => "Documento no se encuentra registrado en nuestro sistema"], 409);
        }
    }

    public function validatePerson($document) {
        $row = Access::where("document", $document)->where("status_id", 1)->first();
//        if ($row != null) {
//            $row->status_id = 2;
//            $row->save();
//            return response()->json(["status" => true, "row" => $row]);
//        } else {
//            return response()->json(["status" => false]);
//        }
    }

}
