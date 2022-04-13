<?php

namespace App\Http\Controllers;

use APP\Horse;
use Illuminate\Http\Request;

class PostHorseController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
