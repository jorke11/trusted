<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
         DB::table("users")->insert([
            'name' => 'jorge',
            'last_name' => 'pinedo',
            'document' => 1032397605,
             'role_id'=>1,
             'stakeholder_id'=>1,
             'status_id'=>1,
            'email' => 'jpinedom@hotmail.com',
            'password' => bcrypt('123')
        ]);
    }

}
