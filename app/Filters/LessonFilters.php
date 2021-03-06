<?php


namespace Azure\Filters;



class LessonFilters extends QueryFilter
{
    public function popular($order = 'desc')
    {
        return $this->builder->orderBy('views', $order);
    }

    public function difficulty($level)
    {
        return $this->builder->where('difficulty', $level);
    }

    public function length($order = 'asc')
    {
        return $this->builder->orderBy('length', $order);
    }
}