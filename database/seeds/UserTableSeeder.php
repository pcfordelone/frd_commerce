<?php

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use FRD\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker::create();

        User::create([
            'name'      => 'PC',
            'email'     => 'pc@fordelone.com.br',
            'password'  => Hash::make(123456),
            'is_admin'  => 1
        ]);

        User::create([
            'name'      => 'Gui',
            'email'     => 'gui@fordelone.com.br',
            'password'  => Hash::make(123),
        ]);

        foreach (range(1, 5) as $i) {
            User::create([
                'name' => $faker->word,
                'email' => $faker->email,
                'password' => Hash::make($faker->word),
            ]);
        }
    }
}