<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model {

    protected $table = "ticket_comment";
    protected $primaryKey = "id";
    protected $fillable = ["id", "comment", "ticket_id"];

}
