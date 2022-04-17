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
                </div>
                
                <div class="color_form">
                    <h4>馬体の色</h4>
                    <label>
                        <input type="text" name="horse_information[color]" valur="{{ old('horse_information.color') }}"/>
                    </label>
                </div>
                
                <div class="father_name_form">
                    <h4>父</h4>
                    <label>
                        <input type="text" name="horse_information[father_name]" value="{{ old('horse_information.father_name') }}"/>
                    </label>
                </div>
                
                <div class="mother_name_form">
                    <h4>母</h4>
                    <label>
                        <input type="text" name="horse_information[mother_name]" value="{{ old('horse_information.mother_name') }}"/>
                    </label>
                </div>
                
                <div class="mothers_father_name_form">
                    <h4>母父</h4>
                    <label>
                        <input type="text" name="horse_information[mothers_father_name]" value="{{ old('horse_information.mothers_father_name') }}"/>
                    </label>
                </div>
                
                <div class="owner_form">
                    <h4>馬主</h4>
                    <label>
                        <input type="text" name="horse_information[owner]" value="{{ old('horse_information.owner') }}"/>
                    </label>
                </div>
                    
                <div class="trainer_form">
                    <h4>調教師</h4>
                    <label>
                        <input type="text" name="horse_information[trainer]" value="{{ old('horse_information.trainer') }}"/>
                    </label>
                </div>
                
                <div class="producer_form">
                    <h4>生産者</h4>
                    <label>
                        <input type="text" name="horse_information[producer]" value="{{ old('horse_information.producer') }}"/>
                    </label>
                </div>
                
                <div class="birthday_form">
                    <h4>生年月日</h4>
                    <label>
                        <input type="text" name="horse_information[birthday]" value="{{ old('horse_information.birthday') }}"/>
                    </label>
                </div>
                
                <div class="winning_form">
                    <h4>主な勝ち鞍</h4>
                    <label>
                        <input type="text" name="horse_information[winning]" value="{{ old('horse_information.winning') }}"/>
                    </label>
                </div>
                
                <div class="form-submit">
                    <input type="submit" value="投稿"/>
                </div>
            </form>
        </div>
@endsection