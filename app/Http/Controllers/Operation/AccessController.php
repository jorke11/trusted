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
use App\Models\Operation\EmployeeLog;
use App\Models\Operation\Employee;

class AccessController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $arl = Parameters::where("group", "arl")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $eps = Parameters::where("group", "eps")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $dependency = Parameters::where("group", "dependency")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $element = Parameters::where("group", "element")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $mark = Parameters::where("group", "mark")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $elements_reception = Parameters::where("group", "element_reception")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $sender = Parameters::where("group", "sender")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();
        $status_access = Parameters::where("group", "status_access")->where("stakeholder_id", Auth::user()->stakeholder_id)->orderBy("description", "asc")->get();

        return view("operation.access.index", compact("arl", "eps", "dependency", "element", "mark", "elements_reception", "sender", "status_access"));
    }

    public function store(Request $req) {
        $in = $req->all();


        $emp = Employee::where("document", $in["document"])->where("stakeholder_id", Auth::user()->stakeholder_id)->first();

        if ($emp == null) {
            $person = Access::where("document", $in["document"])->where("insert_id", Auth::user()->id)->where("status_id", 1)->first();


            if ($person == null) {
                $retrieved = $in["birth_date"];
                $date = \DateTime::createFromFormat('dmY', $retrieved);
                $in["birth_date"] = $date->format('Y-m-d');

                $path = public_path() . "/images/" . date("Y-m-d");
                $pathsys = "images/" . date("Y-m-d");

                $res = File::makeDirectory($path, $mode = 0777, true, true);
                $manager = new ImageManager(array('driver' => 'imagick'));

                $image = $manager->make($in["img"])->widen(400);
                $pathsys .= "/" . $in["document"] . ".jpg";
                $path .= "/" . $in["document"] . ".jpg";


                $in["img"] = url($pathsys);
                $in["birth_date"] = date("Y-m-d", strtotime($in["birth_date"]));
                $in["status_id"] = 1;
                $in["insert_id"] = Auth::user()->id;
                unset($in["id"]);

                if ($in["mark_id"] == "null") {
                    unset($in["mark_id"]);
                }

                $image->save($path);

                $con = Access::where("insert_id", Auth::user()->id)->count();
                $in["consecutive"] = ($con == 0) ? 1 : $con;

                $row = Access::create($in);

                return response()->json(["status" => true, "row" => $row, "msg" => "Registro ingresado"]);
            } else {
                return response()->json(["status" => false, "msg" => "Persona ingresada, tienes que darle salida antes de ingresarlo de nuevo"]);
            }
        } else {

            $log = EmployeeLog::where("employee_id", $emp->id)->where("status_id", 1)->first();

            if ($log != null) {
                $row = EmployeeLog::find($log->id);
                $row->status_id = 2;
                $row->save();
                return response()->json(["status" => true, "row" => $row, "msg" => "Registro Actualizado"]);
            } else {
                $new["stakeholder_id"] = Auth::user()->stakeholder_id;
                $new["status_id"] = 1;
                $new["employee_id"] = $emp->id;
                EmployeeLog::create($new);
                return response()->json(["status" => true, "msg" => "Registro Ingresado"]);
            }
        }
    }

    public function listAccess() {

        $sql = DB::table("vaccess_person");

        if (Auth::user()->role_id != 1) {
            $sql->where("insert_id", Auth::user()->id);
        }

        $sql = $sql->orderBy("id", "desc");

        return Datatables::queryBuilder($sql)->make(true);
    }

    public function addAuthorization(Request $req) {
        $in = $req->all();

        $result = AuthorizationPerson::create($in);

        if ($result) {
            return response()->json(["status" => true]);
        }
    }

    public function update($document) {
        $row = Access::where("document", $document)->where("insert_id", Auth::user()->id)->where("status_id", 1)->first();

        if ($row != null) {
            $row->status_id = 2;
            $row->save();
            return response()->json(["status" => true, "row" => $row]);
        } else {
            return response()->json(["status" => false, "msg" => "Documento no se encuentra registrado en nuestro sistema"], 409);
        }
    }

    public function listEmployeeLog() {
        $query = EmployeeLog::select("employee_log.id", "employee.document", "employee_log.created_at", "employee_log.updated_at", "employee_log.status_id")
                        ->join("employee", "employee.id", "employee_log.employee_id")->where("employee_log.stakeholder_id", Auth::user()->stakeholder_id);
        return Datatables::eloquent($query)->make(true);
    }

    public function validatePerson($document) {
        $row = Access::where("document", $document)->orderBy("created_at", "desc")->first();

        if ($row != null) {
            $row->birth_date = date("dmY", strtotime($row->birth_date));
            return response()->json(["status" => true, "row" => $row]);
        } else {
            return response()->json(["status" => false]);
        }
    }

}
