<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Model;

class AuthorizationPerson extends Model {

    protected $table = "authorization_person";
    protected $primaryKey = "id";
    protected $fillable = ["id", "document", "reason", "status_access_id"];

}
