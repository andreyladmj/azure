<?php

namespace Azure;

use Azure\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function addUser($user)
    {
        $this->guardAgainstTooManyUsers();

        if($user instanceof User) {
            return $this->users()->save($user);
        }

        return $this->users()->saveMany($user);
    }

    public function guardAgainstTooManyUsers()
    {
        if($this->users > 5)
        {
            throw new \Exception();
        }
    }

    public function scopeBusy()
    {
        return static::leftJoin('movies', 'movies.director_id', '=', 'directors.id')
            ->select('directors.id', 'directors.name', \DB::raw('count(movies.id) as movie_count'))
            ->groupBy('directors.id')
            ->orderBy('movie_count', 'desc')
            ->get();
    }
}
