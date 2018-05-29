<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Operation\Access;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;

class AccessController extends Controller {

    public function index() {
        $total = Access::count();
        $current = Access::where("status_id", 1)->count();
        return view("Report.access.index", compact("total", "current"));
    }

    public function listTable(Request $req) {
        $in = $req->all();

        $query = DB::table("vaccess_person")->orderBy("id", "desc");
        if (Auth::user()->role_id != 1) {
            $query->where("stakeholder_id", Auth::user()->stakeholder_id);
        }

        if (isset($in["finit"]) && $in["fend"] != '') {
            $query->where("created_at", ">=", $in["finit"] . " 00:00");
            $query->where("created_at", "<=", $in["fend"] . " 23:59");
        }

        return Datatables::queryBuilder($query)->make(true);
    }

}
