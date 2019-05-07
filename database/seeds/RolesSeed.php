<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'Administrator system',
            'is_read' => true,
            'is_edit' => true,
            'is_delete' => true
        ]);
    }
}
