<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class Access extends Model {

    protected $table = "access_person";
    protected $primaryKey = "id";
    protected $fillable = ["id", "first_name", "second_name", "last_name", "second_surname", "gender", "document", "birth_date", "type_blood", "img", "arl_id", "eps_id"
        , "status_id", "dependency_id", "authorization_person", "element_id", "mark_id", "text_serie", "insert_id", "update_id", "person_contact", "phone_contact",
        "medicine", "consecutive", "observation","stakeholder_id"];

}
