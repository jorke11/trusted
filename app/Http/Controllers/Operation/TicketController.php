<?php

namespace App\Http\Controllers\Operation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Parameters;
use App\Models\Administration\Stakeholder;
use App\Models\Operation\Ticket;
use App\Models\Operation\TicketDetail;
use App\User;
use DB;
use Mail;

class TicketController extends Controller {

    public $email;

    public function __construct() {
        $this->middleware("auth");
        $this->email = [];
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

    public function associate(Request $req, $ticket_id) {
        $in = $req->all();

        $row = Ticket::find($ticket_id);
        $row->status_id = 2;
        $row->user_assigned_id = $in["user_id"];

        $user = User::find($in["user_id"]);
        $send = $this->dataTicketEmail($ticket_id);
        $this->email[] = $user->email;
        $row->save();


        $input["name"] = $user->name;
        $input["last_name"] = $user->last_name;
        $input["subject"] = $send->subject;
        $input["description"] = $send->description;
        $input["priority"] = $send->priority;
        $input["dependency"] = $send->dependency;
        $input["id"] = $send->id;
        $input["client"] = $send->client;
        
        Mail::send("Notifications.associate", $input, function($msj) {
            $msj->subject("notificacion");
            $msj->to($this->email);
        });

        return response()->json(["success" => true]);
    }

    public function dataTicketEmail($ticket_id) {
        return Ticket::select("tickets.id", "stakeholder.business as client", DB::raw("dep.description as dependency"), DB::raw("prio.description as priority"))
                        ->join(DB::raw("parameters as dep"), DB::raw("dep.code"), DB::raw("tickets.dependency_id and dep.group='dependency'"))
                        ->join("stakeholder", "stakeholder.id", "tickets.client_id")
                        ->join(DB::raw("parameters as prio"), "prio.code", DB::raw("tickets.priority_id and prio.group = 'priority'"))
                        ->where("tickets.id", $ticket_id)->first();
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
//            $user = Auth::User();
            $input["status_id"] = 1;

            $chief = User::where("chief_area_id", true)->where("dependency_id", $input["dependency_id"])->first();
            $result = Ticket::create($input);

            $this->email[] = $chief->email;

            $send = $this->dataTicketEmail($result->id);

            $input["priority"] = $send->priority;
            $input["dependency"] = $send->dependency;
            $input["id"] = $send->id;
            $input["client"] = $send->client;

            Mail::send("Notifications.newticket", $input, function($msj) {
                $msj->subject("notificacion");
                $msj->to($this->email);
            });


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
            $result = TicketDetail::create($input);
            if ($result) {
                $detail = TicketDetail::where("ticket_id", $input["ticket_id"])->orderBy("id")->get();
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function edit($id) {
        $header = Ticket::FindOrFail($id);
        $detail = TicketDetail::where("ticket_id", $id)->orderBy("id")->get();
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
