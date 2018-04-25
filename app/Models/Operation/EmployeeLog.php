<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class EmployeeLog extends Model {

    protected $table = "employee_log";
    protected $primaryKey = "id";
    protected $fillable = ["id", "employee_id", "stakeholder_id", "status_id"];

}
