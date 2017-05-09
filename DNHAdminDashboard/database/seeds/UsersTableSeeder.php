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
          'name' => 'Ad Min',
          'email' => 'admin@admin.admin',
          'password' => '$2y$10$sizYxDVDpEOxAHfQCjJ1OOTyj.pjbvnjqSmyMHJbzkDN2Sh6x4t.u',
      ]);
    }
}
