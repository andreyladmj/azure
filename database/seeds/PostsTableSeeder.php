<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
         TestDummy::times(50)->create('Azure\Post');
    }
}
