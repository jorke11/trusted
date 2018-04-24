<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class ReceptionElement extends Model {

    protected $table = "reception_elements";
    protected $primaryKey = "id";
    protected $fillable = ["id", "observation", "reception_element_id", "sender_id", "dependency_id", "received_id", "stakeholder_id", "status_id", "img",
        "observation_delivery", "img_delivery"];

}
