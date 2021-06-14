<?php

use Illuminate\Database\Seeder;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'admin', 'display_name'=>'quan tri he thong'],
            ['name'=>'guest', 'display_name'=>'khach hang'],
            ['name'=>'dev', 'display_name'=>'phat trien he thong'],
            ['name'=>'content', 'display_name'=>'quan tri noi dung'],
        ]);
    }
}
