<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class Access extends Model {

    protected $table = "access_person";
    protected $primaryKey = "id";
    protected $fillable = ["id", "first_name", "second_name", "last_name", "second_surname", "gender", "document", "birth_date", "type_blood", "img", "arl_id", "eps_id"
        , "status_id","dependency_id","authorization_person"];

}