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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        /*
        `id`, `name`, `email`, `password`, `phone_number`, `remember_token`, `created_at`, `updated_at`
        */
        $Users = [
         [
               'id'               => 1,
               'name'             => 'mohamedphp',
               'email'            => 'mohamedzayed709@yahoo.com',
               'password'         => bcrypt('123123'),
               'phone_number'     => '01127946754',
          ],
        ];
        DB::table('users')->insert($Users);
    }
}
