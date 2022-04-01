<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thread;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(15)->create()->each(function($user){
            $threads = Thread::factory(3)->make();
            $user->threads()->saveMany($threads);
        });
    }
}
