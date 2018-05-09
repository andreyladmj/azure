<?php

namespace Azure\Http\Controllers;

use Azure\Jobs\CompileReports;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $job = new CompileReports($request);
        $this->dispatch($job);
        //$this->dispatchFrom(CompileReports::class, $request);


        return 'Done';
    }
}
