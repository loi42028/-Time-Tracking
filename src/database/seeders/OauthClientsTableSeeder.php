<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user seeding
        DB::table('oauth_clients')->insert([
            [
                'id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
                // 'id' => '9371e465-744a-4357-a0f7-2db14056a9fe',
                'name' => 'Admin Personal Access Client',
                'secret' => bcrypt(env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET')),
                'provider' => null,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => env('PASSPORT_PASSWORD_GRANT_CLIENT_ID'),
                // 'id' => '93720438-c598-408c-a1a7-c14abf5f4d81',
                'name' => 'Admin Password Grant Client',
                'secret' => bcrypt(env('PASSPORT_PASSWORD_GRANT_CLIENT_SECRET')),
                // 'secret' => '$2y$10$SYZWYfOfJgisxoylK0ssz.OABvUwl7E1fuPGFqnxsztP9bas8Rl4K',                
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
