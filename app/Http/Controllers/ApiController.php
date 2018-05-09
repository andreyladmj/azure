<?php


namespace Azure\Http\Controllers;


use Illuminate\Http\Response;

class ApiController extends Controller {

    protected $statusCode = 200;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'code' => $this->getStatusCode(),
            ]
        ]);
    }

    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    public function respondCreated($message)
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respond([
            'message' => $message
        ]);
    }

    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }
}