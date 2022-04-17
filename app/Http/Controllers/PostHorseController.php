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
    
    //馬の情報の投稿ページの表示
    //管理者のみ表示
    public function create()
    {
        return view('create_horse_information');
    }
    
    public function store(Request $request, Horse $horse)
    {
        $input = $request['horse_information'];
        $horse->name = $input['name'];
        $horse->color = $input['color'];
        $horse->father_name = $input['father_name'];
        $horse->mother_name = $input['mother_name'];
        $horse->mothers_father_name = $input['mothers_father_name'];
        $horse->owner = $input['owner'];
        $horse->trainer = $input['trainer'];
        $horse->producer = $input['producer'];
        $horse->birthday = $input['birthday'];
        $horse->winning = $input['winning'];
        
        $horse->save();
        
        return redirect('/horse/' . $horse->id);
    }
}
