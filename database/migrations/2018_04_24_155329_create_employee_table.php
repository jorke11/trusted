<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document');
            $table->text('name');
            $table->text('last_name');
            $table->text('position');
            $table->integer('status_id');
            $table->integer('stakeholder_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('employee');
    }

}
