<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('access_person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('second_surname');
            $table->string('gender');
            $table->integer('document');
            $table->date('birth_date');
            $table->string('type_blood');
            $table->text('img');
            $table->integer('arl_id');
            $table->integer('eps_id');
            $table->integer('status_id');
            $table->integer('dependency_id')->nullable();
            $table->string('authorization_person')->nullable();
            $table->integer('element_id')->nullable();
            $table->integer('mark_id')->nullable();
            $table->text('text_serie')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('access_person');
    }

}
