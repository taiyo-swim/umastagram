<?php

namespace App\Http\Controllers;

use App\Horse;
use Illuminate\Http\Request;

class PostHorseController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    //馬の詳細ページの表示
    public function show(Request $request, $id, Horse $horse)
    {
        $horse = Horse::find($id);
        return view('show_horse', ['horse' => $horse]);
    }
}
