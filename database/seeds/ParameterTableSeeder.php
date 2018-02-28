<?php

use Illuminate\Database\Seeder;

class ParameterTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table("parameters")->insert([
            'description' => "cruz blanca",
            'group' => "eps",
            'code' => 1,
        ]);

        DB::table("parameters")->insert([
            'description' => "Sanitas",
            'group' => "eps",
            'code' => 2,
        ]);
        DB::table("parameters")->insert([
            'description' => "Sura",
            'group' => "arl",
            'code' => 1,
        ]);

        DB::table("parameters")->insert([
            'description' => "Porvenir",
            'group' => "arl",
            'code' => 2,
        ]);
    }

}
