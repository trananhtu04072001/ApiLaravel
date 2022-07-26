<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Jobs\NewJob;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index() {
        $name = "Trần Anh Tú";
        NewJob::dispatch($name);
        return true;
    }
}
