<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(UsersGroupsTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(TypeTrackingTableSeeder::class);
        $this->call(TimeTrackingTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
