<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class AgendaController extends Controller
{
    
 public function index() {
 

$date = Carbon::now();
 
$date = $date->format('d-m-Y');
    return view('agenda')->with('date', $date);
}



  public function store(Request $request)
    {

        $request->validate([
             'campo' =>'required_with_all:campo1,campo2',                                               //max  10 caracteres
             'campo1' => 'required',
             'campo2' => 'required',
            'description' => 'required',
        ]);
        $date = Carbon::now();
 
$date = $date->format('d-m-Y');
     return view('agenda')->with('success','ha pasado la prueba')->with('date', $date);
       
    }



}
