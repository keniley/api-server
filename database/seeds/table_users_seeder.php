<?php

use Illuminate\Database\Seeder;

class table_users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate existing data
        App\Model\User::truncate();

        $faker = \Faker\Factory::create();
        
        // Create 10 fake records
        for ($i = 0; $i < 10; $i++) {
            App\Model\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'is_admin' => rand(0,1),
            ]);
        }
    }
}
