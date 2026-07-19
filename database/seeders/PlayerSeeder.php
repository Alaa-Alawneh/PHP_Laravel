<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Player;
class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            ['first_name' => 'Gregory', 'last_name' => 'House',   'email' => 'house@club.test'],
            ['first_name' => 'James',   'last_name' => 'Wilson',  'email' => 'wilson@club.test'],
            ['first_name' => 'Lisa',    'last_name' => 'Cuddy',   'email' => 'cuddy@club.test'],
            ['first_name' => 'Eric',    'last_name' => 'Foreman', 'email' => 'foreman@club.test'],
            ['first_name' => 'Allison', 'last_name' => 'Cameron', 'email' => 'cameron@club.test'],
            ['first_name' => 'Robert',  'last_name' => 'Chase',   'email' => 'chase@club.test'],
            ['first_name' => 'Chris',   'last_name' => 'Taub',    'email' => 'taub@club.test'],
            ['first_name' => 'Remy',    'last_name' => 'Hadley',  'email' => 'thirteen@club.test'],
        ];

        foreach ($players as $player) {
            Player::updateOrCreate(
                ['email' => $player['email']],
                [
                    'first_name' => $player['first_name'],
                    'last_name'  => $player['last_name'],
                    'password'   => 'password',
                ]
            );
        }
    }
}
