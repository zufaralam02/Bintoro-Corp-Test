<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = mt_rand(1262055681, 1262055681);

        $gender = ['male', 'female'];

        User::create([
            'name' => Str::random(10),
            'birth_date' => date("Y-m-d", $date),
            'birth_place' => Str::random(10),
            'gender' => $gender[rand(0, 1)]
        ]);
    }
}
