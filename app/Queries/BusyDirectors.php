<?php

namespace App\Queries;

use Azure\Lesson;

class BusyDirectors
{
    protected $scoped;

    public function __construct($scoped = null)
    {
        $this->scoped = $scoped ?: new Lesson;
    }

    public function get()
    {
        return $this->scoped->leftJoin('movies', 'movies.director_id', '=', 'directors.id')
            ->select('directors.id', 'directors.name', \DB::raw('count(movies.id) as movie_count'))
            ->groupBy('directors.id')
            ->orderBy('movie_count', 'desc')
            ->get();
    }
}