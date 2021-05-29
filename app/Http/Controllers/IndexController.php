<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        dd('Controller....homeIndexController');
        echo 'Controller.... homeIndexController ';
        //return view('index.index');
    }


}
