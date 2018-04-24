<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    protected $table = "employee";
    protected $primaryKey = "id";
    protected $fillable = ["id", "document", "name", "last_name", "position", "status_id", "stakeholder_id"];

}
