<?php

namespace App\Http\Controllers\Operation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Parameters;
use App\Models\Administration\Stakeholder;
use App\Models\Operation\Ticket;
use App\User;

class TicketController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $dependency = Parameters::where("group", "dependency")->get();
        $clients = Stakeholder::all();
        $status = Parameters::where("group", "ticket")->get();
        $priority = Parameters::where("group", "priority")->get();
        $user = User::all();
        return view("operation.ticket.init", compact("dependency", "priority", "user", "status", "clients"));
    }

    public function create() {
        return "create";
    }

    public function getUsersDependency($dependency_id) {
        $users = User::where("dependency_id", $dependency_id)->get();
        return response()->json($users);
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
//            $user = Auth::User();
            $input["status_id"] = 1;
            $result = Ticket::create($input);
            if ($result) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function updateAssociate(Request $req, $id) {
        $in = $req->all();

        $user = Users::find($in["user_id"]);

        $in["name"] = $user->name;
        $in["last_name"] = $user->last_name;
        $this->email[] = $user->email;

        $in = (array) DB::table("vorders")->where("id", $id)->first();

        Mail::send("Notifications.associate", $in, function($msj) {
            $msj->subject("notificacion");
            $msj->to($this->email);
        });

        $order = Orders::find($id);
        $order->responsible_id = $user->id;
        $order->assigned = date("Y-m-d H:i:s");
        $order->status_id = 2;
        $order->event_id = 2;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function addComment(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
//            $user = Auth::User();
            $result = TicketComment::create($input);
            if ($result) {
                $detail = TicketComment::where("ticket_id", $input["ticket_id"])->orderBy("id")->get();
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function edit($id) {
        $header = Ticket::FindOrFail($id);
        $detail = TicketComment::where("ticket_id", $id)->orderBy("id")->get();
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function update(Request $request, $id) {
        $category = Ticket::FindOrFail($id);
        $input = $request->all();
        $result = $category->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $category = Ticket::FindOrFail($id);
        $result = $category->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
