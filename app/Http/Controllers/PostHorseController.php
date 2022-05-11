<?php

namespace App\Http\Controllers;

use App\Horse;
use App\User;
use App\Picture;
use App\Http\Requests\PostHorseRequest;
use Illuminate\Http\Request;

// DIを利用する（関数が実⾏される直前に、該当idのテーブルデータが設定されたインスタンスの⽣成をLaravel
// の内部処理で⾃動的に⾏い、引数の変数に格納してくれる）

// 1. ルーティング設定で、IDをURLから取得できるようにする。
// 2. ルーティングで呼び出される関数の引数に該当のModelクラスを追加する。


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
    public function show(Horse $horse)
    {
        $horse_pictures = Picture::where('horse_id', $horse->id)->get();

        return view('show_horse', ['horse' => $horse, 'horse_pictures' => $horse_pictures]);
    }
    
    //馬の情報の投稿ページの表示
    //管理者のみ表示
    public function create()
    {
        $this->middleware('can:admin');
        return view('create_horse_information');
    }
    
    //馬の情報の投稿
    //管理者のみ可能
    public function store(PostHorseRequest $request, Horse $horse)
    {
        $this->middleware('can:admin');
        
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
    public function edit(Horse $horse)
    {
        $this->middleware('can:admin');
        return view('edit_horse_information', ['horse' => $horse]);
    }
    
    //馬の情報の編集
    //管理者のみ可能
    public function update(PostHorseRequest $request, Horse $horse)
    {
        $this->middleware('can:admin');
        
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
    
    public function destory(Horse $horse)
    {
        $this->middleware('can:admin');
        
        $horse->delete();
        
        return redirect('/');
    }
}
