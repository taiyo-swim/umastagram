@extends('layout')

@section('content')
    <div class="horse_information_form">
            <form action="/horse" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name_form">
                    <h4>馬名</h4>
                    <label>
                        <input type="text" name="horse_information[name]" value="{{ old('horse_information.name') }}"/>
                    </label>
                    @error('horse_information.name')  <!--エラーメッセージの有無を確認-->
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="sex_form">
                    <h4>性別</h4>
                    <label><input type="radio" name="horse_information[sex]" value="牡" {{ old('horse_information.sex') == '牡' ? 'checked' : '' }}/>牡</label>
                    <label><input type="radio" name="horse_information[sex]" value="牝" {{ old('horse_information.sex') == '牝' ? 'checked' : '' }}/>牝</label>
                    <label><input type="radio" name="horse_information[sex]" value="セン" {{ old('horse_information.sex') == 'セン' ? 'checked' : '' }}/>セン</label>
                    @error('horse_information.sex')  <!--エラーメッセージの有無を確認-->
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="color_form">
                    <h4><label for="horse-color-choice">馬体の色</label></h4>
                    <input list="horse-colors" id="horse-color-choice" name="horse_information[color]" value="{{ old('horse_information.color') }}"/>
                    
                    <datalist id="horse-colors">
                        <option value="鹿毛">
                        <option value="黒鹿毛">
                        <option value="青鹿毛">
                        <option value="青毛">
                        <option value="芦毛">
                        <option value="栗毛">
                        <option value="栃栗毛">
                        <option value="白毛">
                    </datalist>
                    @error('horse_information.color')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror

                </div>
                
                <div class="father_name_form">
                    <h4>父</h4>
                    <label>
                        <input type="text" name="horse_information[father_name]" value="{{ old('horse_information.father_name') }}"/>
                    </label>
                    @error('horse_information.father_name')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mother_name_form">
                    <h4>母</h4>
                    <label>
                        <input type="text" name="horse_information[mother_name]" value="{{ old('horse_information.mother_name') }}"/>
                    </label>
                    @error('horse_information.mother_name')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mothers_father_name_form">
                    <h4>母父</h4>
                    <label>
                        <input type="text" name="horse_information[mothers_father_name]" value="{{ old('horse_information.mothers_father_name') }}"/>
                    </label>
                    @error('horse_information.mothers_father_name')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="owner_form">
                    <h4>馬主</h4>
                    <label>
                        <input type="text" name="horse_information[owner]" value="{{ old('horse_information.owner') }}"/>
                    </label>
                    @error('horse_information.owner')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                    
                <div class="belong_form">
                    <h4>所属</h4>
                    <label><input type="radio" name="horse_information[belong]" value="美浦" {{ old('horse_information.belong') == '美浦' ? 'checked' : '' }}/>美浦</label>
                    <label><input type="radio" name="horse_information[belong]" value="栗東" {{ old('horse_information.belong') == '栗東' ? 'checked' : '' }}/>栗東</label>
                    <label><input type="radio" name="horse_information[belong]" value="地方" {{ old('horse_information.belong') == '地方' ? 'checked' : '' }}/>地方</label>
                    <label><input type="radio" name="horse_information[belong]" value="海外" {{ old('horse_information.belong') == '海外' ? 'checked' : '' }}/>海外</label>
                    @error('horse_information.belong')  <!--エラーメッセージの有無を確認-->
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="trainer_form">
                    <h4>調教師</h4>
                    <label>
                        <input type="text" name="horse_information[trainer]" value="{{ old('horse_information.trainer') }}"/>
                    </label>
                    @error('horse_information.trainer')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="producer_form">
                    <h4>生産者</h4>
                    <label>
                        <input type="text" name="horse_information[producer]" value="{{ old('horse_information.producer') }}"/>
                    </label>
                    @error('horse_information.producer')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="birthday_form">
                    <h4>生年月日</h4>
                    <label>
                        <input type="text" name="horse_information[birthday]" value="{{ old('horse_information.birthday') }}"/>
                    </label>
                    @error('horse_information.birthday')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="winning_form">
                    <h4>主な勝ち鞍</h4>
                    <label>
                        <input type="text" name="horse_information[winning]" value="{{ old('horse_information.winning') }}"/>
                    </label>
                    @error('horse_information.winning')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="total_result_form">
                    <h4>通算成績</h4>
                    <label>
                        <input type="text" name="horse_information[total_result]" value="{{ old('horse_information.total_result') }}"/>
                    </label>
                    @error('horse_information.total_result')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="netkeiba_url_form">
                    <h4>ネット競馬URL</h4>
                    <label>
                        <input type="text" name="horse_information[netkeiba_url]" value="{{ old('horse_information.netkeiba_url') }}"/>
                    </label>
                    @error('horse_information.netkeiba_url')
                        <p class="horse_information_error" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="form-submit">
                    <input type="submit" value="投稿"/>
                </div>
            </form>
        </div>
@endsection