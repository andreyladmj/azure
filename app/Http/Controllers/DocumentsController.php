<?php

namespace Azure\Http\Controllers;

use Azure\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function show(Document $document)
    {
        return $document;
    }
}
