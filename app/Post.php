<?php

namespace Azure;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getSomePosts()
    {
        $someArray = [];

        return collect($someArray)->map(function($post) {
            return new Post($post);
        });

        /*
        wrapper

        class a {
            protected $item;

            public function __construct($item)
            {
                $this->item = $item;
            }

            public function getDate($f) {
                return $this->item->date->format($f);
            }

            public function path()
            {
                return '/podcast/' . $this->id;//will work because call __get method
            }

            public function __get($property)
            {
                if(isset($this->item->$property))
                {
                    return $this->item->$property;
                }

                throw new \Exception('Unknown property access.');
            }
        }


         * */
    }
}
