<?php

use Azure\Lesson;
use Illuminate\Database\Seeder;


class LessonTagTableSeeder extends Seeder
{
    public function run()
    {
         $faker = Faker\Factory::create();

        $lessonIds = Lesson::pluck('id');
        $tagIds = Lesson::pluck('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('lesson_tag')->create([
                'lesson_id' => $faker->randomElement($lessonIds),
                'tag_id' => $faker->randomElement($tagIds),
            ]);
        }
    }
}
