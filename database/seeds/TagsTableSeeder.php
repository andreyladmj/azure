<?php

use Illuminate\Database\Seeder;


class TagsTableSeeder extends Seeder
{
    public function run()
    {
         $faker = Faker\Factory::create();

        foreach(range(1, 10) as $index)
        {
            Tag::create([
                'name' => $faker->word
            ]);
        }
    }
}
