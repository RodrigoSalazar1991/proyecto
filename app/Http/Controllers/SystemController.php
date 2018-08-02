<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Responsen;
use Artisan;


class SystemController extends Controller
{
    public function postDbBackUp () {
   $now =  Carbon::now()->format("Y-m-d-H-m-i").'-backup.sql';
    try {
        Artisan::call('db:backup',
            [
                '--database' => 'mysql',
                '--destination' => 'local',
                '--destinationPath' =>$now,
                '--compression' => 'gzip'
            ]
        );
    }
    catch(\Exception $e) {
        return Response::json([
            'success' => false,
            'errors' => ""
        ], 400);
    }
    return Response::json([
        'success' => true,
        'message' => 'success'
    ]);

}
}
