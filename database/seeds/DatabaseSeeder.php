<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tables = [
        'lessons',
        'tags',
        'lesson_tag',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDB();

        $this->call(PostsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);

        //php artisan migrate:refresh --seed
    }

    private function cleanDB()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
