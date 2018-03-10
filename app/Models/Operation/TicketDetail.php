<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model {

    protected $table = "tickets_detail";
    protected $primaryKey = "id";
    protected $fillable = ["id", "comment", "ticket_id"];

}
