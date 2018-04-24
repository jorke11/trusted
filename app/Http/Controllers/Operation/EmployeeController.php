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
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Operation\Employee;

class EmployeeController extends Controller {

    public $updated;
    public $inserted;

    public function __construct() {
        $this->middleware("auth");

        $this->updated = 0;
        $this->inserted = 0;
    }

    public function index() {
        return view("operation.employee.index");
    }

    public function store(Request $req) {
        $in = $req->all();

        $person = Access::where("document", $in["document"])->where("status_id", 1)->first();

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

            unset($in["id"]);

            if ($in["mark_id"] == "null") {
                unset($in["mark_id"]);
            }

            $image->save($path);
            $row = Access::create($in);

            return response()->json(["status" => true, "row" => $row, "msg" => "Registro ingresado"]);
        } else {
            return response()->json(["status" => false, "msg" => "Persona ingresada, tienes que darle salida antes de ingresarlo de nuevo"]);
        }
    }

    public function uploadEmployee(Request $req) {

        $this->in = $req->all();
        $this->name = '';
        $this->path = '';
        $file = array_get($this->in, 'file_employee');


        $this->name = $file->getClientOriginalName();
        $this->name = str_replace(" ", "_", $this->name);
        $this->path = "uploads/employee/" . date("Y-m-d") . "/" . $this->name;


        $file->move("uploads/employee/" . date("Y-m-d") . "/", $this->name);
        $error = array();
        Excel::load($this->path, function($reader) {
            foreach ($reader->get() as $book) {

                $new["document"] = $book->cedula;
                $new["name"] = $book->nombre;
                $new["last_name"] = $book->apellido;
                $new["position"] = $book->cargo;
                $new["stakeholder_id"] = Auth::user()->stakeholder_id;
                $new["status_id"] = 1;

                $row = Employee::where("document", $book->cedula)->first();

                if ($row != null) {
                    $emp = Employee::find($row->id);
                    $emp->fill($new)->save();
                    $this->updated++;
                } else {
                    Employee::create($new);
                    $this->inserted++;
                }
            }
        })->get();

        return response()->json(["success" => true, "inserted" => $this->inserted, "updated" => $this->updated, "error" => $error]);
    }

    public function listEmployee() {
        return Datatables::eloquent(Employee::where("stakeholder_id", Auth::user()->stakeholder_id))->make(true);
    }

    public function addAuthorization(Request $req) {
        $in = $req->all();

        $result = AuthorizationPerson::create($in);

        if ($result) {
            return response()->json(["status" => true]);
        }
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
        $row = Access::where("document", $document)->orderBy("created_at", "desc")->first();
        if ($row != null) {
            $row->birth_date = date("dmY", strtotime($row->birth_date));
            return response()->json(["status" => true, "row" => $row]);
        } else {
            return response()->json(["status" => false]);
        }
    }

}
