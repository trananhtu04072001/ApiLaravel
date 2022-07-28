<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Jobs\NewJob;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index() {
        $name = "Trần Anh Tú";
        NewJob::dispatch($name);
        return true;
    }

    public function Sendmail() {
        $emailjob = (new SendEmail())->delay(Carbon::now()->addSecond(5));
        SendEmail::dispatch($emailjob);
        echo 'gửi email';
    }
}
