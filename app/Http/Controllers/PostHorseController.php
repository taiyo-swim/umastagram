<?php

namespace App\Http\Controllers;

use App\Horse;
use App\User;
use App\Models\Picture;
use App\Http\Requests\PostHorseRequest;
use Illuminate\Http\Request;


//ここに出てくる$idは全てhorsesテーブルのidカラムの値

class PostHorseController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function search(Request $request)
    {
        $query = Horse::query();  //クエリを生成
        
        if($request->input('horse_name_keyword') != null)
        {
            $keyword = $request->input('horse_name_keyword');
            $query->where('name','like','%'.$keyword.'%');
            $keyword_item = "馬名";
        }elseif($request->input('owner_keyword') != null)
        {
            $keyword = $request->input('owner_keyword');
            $query->where('owner','like','%'.$keyword.'%');
            $keyword_item = "馬主";
        }elseif($request->input('trainer_keyword') != null)
        {
            $keyword = $request->input('trainer_keyword');
            $query->where('trainer','like','%'.$keyword.'%');
            $keyword_item = "調教師";
        }elseif($request->input('producer_keyword') != null)
        {
            $keyword = $request->input('producer_keyword');
            $query->where('producer','like','%'.$keyword.'%');
            $keyword_item = "生産者";
        }
        
        $horses = $query->orderBy('name','desc')->get();
        $count = $query->count();
        
        return view('search_horses', ['horses' => $horses, 'count' => $count, 'keyword' => $keyword, 'keyword_item' => $keyword_item]);
        
    }
    
    //馬の詳細ページの表示
    public function show($id)
    {
        $horse = Horse::find($id);
        
        $horse_pictures = Picture::where('horse_id', $id)->get();

        return view('show_horse', ['horse' => $horse, 'horse_pictures' => $horse_pictures]);
    }
    
    //馬の情報の投稿ページの表示
    //管理者のみ表示
    public function create()
    {
        return view('create_horse_information');
    }
    
    //馬の情報の投稿
    //管理者のみ可能
    public function store(PostHorseRequest $request, Horse $horse)
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
    
    //馬の情報の編集ページの表示
    //管理者のみ表示
    public function edit($id, Horse $horse)
    {
        $horse = Horse::find($id);
        
        return view('edit_horse_information', ['horse' => $horse]);
    }
    
    //馬の情報の編集
    //管理者のみ可能
    public function update(PostHorseRequest $request, $id, Horse $horse)
    {
        $horse = Horse::find($id); //元のデータを更新させるため、idでデータを取ってくる
        
        $edit = $request['horse_information'];
        $horse->name = $edit['name'];
        $horse->color = $edit['color'];
        $horse->father_name = $edit['father_name'];
        $horse->mother_name = $edit['mother_name'];
        $horse->mothers_father_name = $edit['mothers_father_name'];
        $horse->owner = $edit['owner'];
        $horse->trainer = $edit['trainer'];
        $horse->producer = $edit['producer'];
        $horse->birthday = $edit['birthday'];
        $horse->winning = $edit['winning'];
        
        $horse->save();
        
        return redirect('/horse/' . $horse->id);
    }
    
    public function destory($id)
    {
        $horse = Horse::find($id);
        $horse->delete();
        
        return redirect('/');
    }
}
