<?php

namespace Azure\Http\Controllers;

use Azure\Lesson;
use Illuminate\Http\Request;

class TagsController extends ApiController
{
    public function index($id = null)
    {
        $tags = $id ? Lesson::find($id)->tags : Tag::all();

        return $this->respond([
            'data' => $this->transformer->transformCollection($tags->all())
        ]);
    }
}
