<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'phillip madsen', 'email' => 'wecodelaravel@gmail.com', 'password' => '$2y$10$W3elSRH.ZdioWg6nWrgw3u7MZvpLE1SNfZViGVgodGnKJMM2D5SUe', 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
