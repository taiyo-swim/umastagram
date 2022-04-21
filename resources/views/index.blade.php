@extends('layout')

@section('content')
    <h1>umastagramへようこそ！</h1>
    <div class="horse_search">
        <select class="form-select" id="select" onchange="formChange();">
            <option value="select_horse_name">馬名</option>
            <option value="select_owner">馬主</option>
            <option value="select_trainer">調教師</option>
            <option value="select_producer">生産者</option>
        </select>
        <!--↓↓ 検索フォーム（馬名・馬主名・調教師名・生産者） ↓↓-->
        <div class="search_box">
            <div id="box_horse_name">
                <form  class="search_form" method="get" action="/horses/search">
                @csrf
                    <input type="text" name="horse_name_keyword" class="search-box" placeholder="馬名">
                    <button type="submit" class="search_button">検索</button>
                </form>
            </div>
            <div id="box_owner" style="display:none;">
                <form  class="search_form" method="get" action="/horses/search">
                @csrf
                    <input type="text" name="owner_keyword" class="search-box" placeholder="馬主名">
                    <button type="submit" class="search_button">検索</button>
                </form>
            </div>
            <div id="box_trainer" style="display:none;">
                <form  class="search_form" method="get" action="/horses/search">
                @csrf
                    <input type="text" name="trainer_keyword" class="search-box" placeholder="調教師名">
                    <button type="submit" class="search_button">検索</button>
                </form>
            </div>
            <div id="box_producer" style="display:none;">
                <form  class="search_form" method="get" action="/horses/search">
                @csrf
                    <input type="text" name="producer_keyword" class="search-box" placeholder="生産者名">
                    <button type="submit" class="search_button">検索</button>
                </form>
            </div>
        </div>
        <!--↑↑ 検索フォーム ↑↑-->
    </div>
    <h3><a href='{{ route("umastagram.create") }}'>競走馬情報の登録</a></h3>
    
    
    
    
    <!--↓↓ 検索ボックスの切り替え処理 ↓↓-->
    <script>
        function formChange(){
            if(document.getElementById('select')){
                id = document.getElementById('select').value;
                if(id == 'select_horse_name'){
                    document.getElementById('box_horse_name').style.display = "";
                    document.getElementById('box_owner').style.display = "none";
                    document.getElementById('box_trainer').style.display = "none";
                    document.getElementById('box_producer').style.display = "none";
                }else if(id == 'select_owner'){
                    document.getElementById('box_horse_name').style.display = "none";
                    document.getElementById('box_owner').style.display = "";
                    document.getElementById('box_trainer').style.display = "none";
                    document.getElementById('box_producer').style.display = "none";
                }else if(id == 'select_trainer'){
                    document.getElementById('box_horse_name').style.display = "none";
                    document.getElementById('box_owner').style.display = "none";
                    document.getElementById('box_trainer').style.display = "";
                    document.getElementById('box_producer').style.display = "none";
                }else if(id == 'select_producer'){
                    document.getElementById('box_horse_name').style.display = "none";
                    document.getElementById('box_owner').style.display = "none";
                    document.getElementById('box_trainer').style.display = "none";
                    document.getElementById('box_producer').style.display = "";
                }
            }
        
        window.onload = viewChange;
        }
    </script>
@endsection