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
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
            ['id' => 1, 'admin' => '1', 'user' => '0','firstname' =>'Admin', 'lastname' => 'Admin', 'username' => 'admin', 'password' => '$2a$04$AqW3KL1yYIPkpDqMdstaAuMZGiqwgWhgxLHsYzXfsbUaag90.tVw6', 'color' => 'FF0000/ffff00', 'ban' => '0', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
