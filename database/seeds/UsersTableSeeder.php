<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'João Paulo',
            'email' => 'joao.paulo@gmail.com',
            'password' => bcrypt('jp2gmd2137'),
        ]);

        DB::table('users')->insert([
            'name' => 'Testowiron',
            'email' => 'testo@gmail.com',
            'password' => bcrypt('caleczki123'),
        ]);
    }
}
