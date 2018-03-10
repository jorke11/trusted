<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

    protected $table = "tickets";
    protected $primaryKey = "id";
    protected $fillable = ["id", "subject", "description", "priority_id", "dependency_id", "status_id", "document", "client_id", "user_assigned_id"];

}
