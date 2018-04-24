<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionElementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('reception_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->text('observation')->nullable();
            $table->integer('reception_element_id');
            $table->integer('sender_id');
            $table->integer('dependency_id');
            $table->integer('received_id');
            $table->integer('stakeholder_id');
            $table->integer('status_id');
            $table->text('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('reception_elements');
    }

}
