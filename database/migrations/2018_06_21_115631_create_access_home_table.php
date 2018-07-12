<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessHomeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('access_person_home', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('second_surname');
            $table->string('gender');
            $table->integer('document');
            $table->date('birth_date')->nullable();
            $table->string('type_blood')->nullable();
            $table->text('img');
            $table->integer('arl_id');
            $table->integer('eps_id');
            $table->integer('status_id');
            $table->integer('torre_id')->nullable();
            $table->integer('apartment_id')->nullable();
            $table->integer('type_visit_id')->nullable();
            $table->integer('park_id')->nullable();
            $table->decimal('price', 15, 2);
            $table->string('plate')->nullable();
            $table->string('authorization_person')->nullable();
            $table->integer('element_id')->nullable();
            $table->integer('mark_id')->nullable();
            $table->integer('insert_id')->nullable();
            $table->integer('stakeholder_id')->nullable();
            $table->text('text_serie')->nullable();
            $table->text('observation')->nullable();
            $table->string('consecutive')->nullable();
            $table->integer('time_in_park')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('access_person_home');
    }

}
