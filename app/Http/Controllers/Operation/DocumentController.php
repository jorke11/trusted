<?php

namespace App\Http\Controllers\Operation;

use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Operation\Access;
use App\Models\Administration\Parameters;
use App\Models\Operation\ReceptionElement;
use App\Models\Operation\AuthorizationPerson;
use File;
use Auth;
use DB;
use Datatables;
use Session;

class DocumentController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $elements_reception = Parameters::where("group", "element_reception")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $sender = Parameters::where("group", "sender")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $dependency = Parameters::where("group", "dependency")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();

        return view("operation.document.index", compact("elements_reception", "sender", "dependency"));
    }

    public function listElements() {
        $sql = DB::table("vreception_elements")->orderBy("id", "desc");

        if (Auth::user()->role_id != 1) {
            $sql->where("stakeholder_id", Auth::user()->stakeholder_id);
        }

        $sql = $sql->orderBy("id", "desc");

        return Datatables::queryBuilder($sql)->make(true);
    }

    public function store(Request $req) {
        $in = $req->all();
        $in["status_id"] = 1;

        unset($in["id"]);

        $in["stakeholder_id"] = Auth::user()->stakeholder_id;

        $img = $in["img"];
        unset($in["img"]);
        $result = ReceptionElement::create($in)->id;


        $path = public_path() . "/images/" . date("Y-m-d");
        $pathsys = "images/" . date("Y-m-d");

        $res = File::makeDirectory($path, $mode = 0777, true, true);
        $manager = new ImageManager(array('driver' => 'imagick'));

        $image = $manager->make($img)->widen(400);
        $pathsys .= "/" . $result . ".jpg";
        $path .= "/" . $result . ".jpg";

        $row = ReceptionElement::find($result);
        $row->img = $pathsys;

        $image->save($path);

        $row->save();

        return response()->json(["status" => true, "row" => $row, "msg" => "Registro ingresado"]);
    }

    public function getUserDependency($dependency_id) {
        $users = \App\Models\Security\Users::where("dependency_id", $dependency_id)->whereIn("role_id", array(2, 3))->get();
        return response()->json($users);
    }

    public function update(Request $req, $id) {
        $in = $req->all();

        $img = $in["img"];
        unset($in["img"]);
        $path = public_path() . "/images/delivery/" . date("Y-m-d");
        $pathsys = "images/delivery/" . date("Y-m-d");

        $res = File::makeDirectory($path, $mode = 0777, true, true);
        $manager = new ImageManager(array('driver' => 'imagick'));


        $image = $manager->make($img)->widen(400);
        $pathsys .= "/" . $id . ".jpg";
        $path .= "/" . $id . ".jpg";

        $image->save($path);

        $row = ReceptionElement::find($id);


        if ($row != null) {
            $row->img_delivery = $pathsys;
            $row->observation_delivery = $in["observation_delivery"];
            $row->status_id = 2;
            $row->save();

            return response()->json(["status" => true, "row" => $row]);
        } else {
            return response()->json(["status" => false, "msg" => "Documento no se encuentra registrado en nuestro sistema"], 409);
        }
    }

}
