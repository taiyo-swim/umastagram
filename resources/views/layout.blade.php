<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Umastagram</title>
    
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        
    </head>
    
    <body>
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: rgb(59,79,102);">
            <div class="container">
                <a class="navbar-brand" href="{{route('umastagram.top')}}"><img src="/img/Umastagram.png" alt="logo" class="d-inline-block align-top"  width="100" height="60"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="horse_search navbar-nav">
                        <li class="nav-item">
                            <select class="form-control" id="select" onchange="formChange();">
                                <option value="select_horse_name">馬名</option>
                                <option value="select_owner">馬主</option>
                                <option value="select_trainer">調教師</option>
                                <option value="select_producer">生産者</option>
                            </select>
                        </li>
                        <!--↓↓ 検索フォーム（馬名・馬主名・調教師名・生産者） ↓↓-->
                        <li class="nav-item">
                            <div class="search_box">
                                <div id="box_horse_name">
                                    <form  class="form-inline" method="get" action="/horses/search">
                                    @csrf
                                        <input type="text" name="horse_name_keyword" class="form-control mr-sm-2" placeholder="馬名">
                                        <button type="submit" class="btn btn-outline-success">検索</button>
                                    </form>
                                </div>
                                <div id="box_owner" style="display:none;">
                                    <form  class="form-inline" method="get" action="/horses/search">
                                    @csrf
                                        <input type="text" name="owner_keyword" class="form-control mr-sm-2" placeholder="馬主名">
                                        <button type="submit" class="btn btn-outline-success">検索</button>
                                    </form>
                                </div>
                                <div id="box_trainer" style="display:none;">
                                    <form  class="form-inline" method="get" action="/horses/search">
                                    @csrf
                                        <input type="text" name="trainer_keyword" class="form-control mr-sm-2" placeholder="調教師名">
                                        <button type="submit" class="btn btn-outline-success">検索</button>
                                    </form>
                                </div>
                                <div id="box_producer" style="display:none;">
                                    <form  class="form-inline" method="get" action="/horses/search">
                                    @csrf
                                        <input type="text" name="producer_keyword" class="form-control mr-sm-2" placeholder="生産者名">
                                        <button type="submit" class="btn btn-outline-success">検索</button>
                                    </form>
                                </div>
                            </div>
                            <!--↑↑ 検索フォーム ↑↑-->
                        </li>
                    </div>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class='container'>
            @yield('content')
        </div>
        
        
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
    </body>
</html>