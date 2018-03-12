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
        DB::table("parameters")->insert([
            'description' => "Comercial",
            'group' => "dependency",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Nuevo",
            'group' => "ticket",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Alto",
            'group' => "priority",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Natural",
            'group' => "type_person",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Tecnologia",
            'group' => "sector",
            'code' => 1,
        ]);

        DB::table("parameters")->insert([
            'description' => "Comun",
            'group' => "type_regimen",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "nit",
            'group' => "type_document",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Cliente",
            'group' => "type_stakeholder",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Nuevo",
            'group' => "generic",
            'code' => 1,
        ]);
        DB::table("parameters")->insert([
            'description' => "Email",
            'group' => "type_contact",
            'code' => 1,
        ]);

//        DB::table("departments")->insert([
//            'description' => "Departmenttest",
//            'code' => '001'
//        ]);
//
//        DB::table("cities")->insert([
//            'description' => "bogotoa",
//            'department_id' => 1,
//            'code' => 1,
//        ]);
    }

}
