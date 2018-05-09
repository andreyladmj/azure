<?php

namespace Azure\Http\Controllers;

use Azure\Acme\Transformers\LessonTransformer;
use Azure\Filters\LessonFilters;
use Azure\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class LessonsController extends ApiController
{
    /**
     * @var $transformer LessonTransformer
     * **/
    protected $transformer;

    /**
     * LessonsController constructor.
     * @param $transformer
     */
    public function __construct(LessonTransformer $transformer)
    {
        $this->transformer = $transformer;

        //$this->middleware('auth.basic', ['on' => 'post']);
    }

    public function index(LessonFilters $filters)
    {
        return Lesson::filter($filters)->get();
    }

    public function all()
    {
        $limit = Input::get('limit') ?: 3;
        $lessons = Lesson::paginate($limit);

        // maybe extract it to respondWithPaginator
        return $this->respond([
            'data' => $this->transformer->transformCollection($lessons->all()), // all - the same as toArray()
            'paginator' => [
                'total_count' => $lessons->getTotal(),
                'total_pages' => $lessons->getTotal() / $lessons->getPerPage(),
                'current_page' => $lessons->getCurrentPage(),
                'limit' => $lessons->getPerPage(),
            ]
        ]);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if(!$lesson) {
            return $this->respondNotFound();
        }

        return $this->respond([
            'data' => $this->transformer->transform($lesson)
        ]);
    }

    public function store()
    {
        if( ! Input::get('title') || ! Input::get('body'))
        {
            return $this->setStatusCode(422)->respondWithError('Parameters are failed!');
        }

        Lesson::create(Input::all());

        return $this->respondCreated('Lesson successfully created.');
    }
}
