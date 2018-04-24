<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

class Parameters extends Model {

    protected $table = "parameters";
    protected $primaryKey = "id";
    protected $fillable = ["id", "stakeholder_id", "description", "value", "group", "code"];

}
