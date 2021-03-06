<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('description');
            $table->integer('dependency_id');
            $table->integer('client_id');
            $table->integer('priority_id');
            $table->integer('status_id');
            $table->integer('type_contact_id');
            $table->integer('user_assigned_id')->nullable();
            $table->text('document')->nullable();
            $table->string('person_contact')->nullable();
            $table->string('phone_contact')->nullable();
            $table->string('medicine')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tickets');
    }

}
