@extends('layout')

@section('content')
    <div class="horse_information_form">
            <form action="/horse/update/{{ $horse->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="name_form">
                    <h4>馬名</h4>
                    <label>
                        <input type="text" name="horse_information[name]" value="{{ $horse->name }}"/>
                    </label>
                </div>
                
                <div class="color_form">
                    <h4><label for="horse-color-choice">馬体の色</label></h4>
                    <input list="horse-colors" id="horse-color-choice" name="horse_information[color]" value="{{ $horse->color }}"/>
                    
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
                </div>
                
                <div class="father_name_form">
                    <h4>父</h4>
                    <label>
                        <input type="text" name="horse_information[father_name]" value="{{ $horse->father_name }}"/>
                    </label>
                </div>
                
                <div class="mother_name_form">
                    <h4>母</h4>
                    <label>
                        <input type="text" name="horse_information[mother_name]" value="{{ $horse->mother_name }}"/>
                    </label>
                </div>
                
                <div class="mothers_father_name_form">
                    <h4>母父</h4>
                    <label>
                        <input type="text" name="horse_information[mothers_father_name]" value="{{ $horse->mothers_father_name }}"/>
                    </label>
                </div>
                
                <div class="owner_form">
                    <h4>馬主</h4>
                    <label>
                        <input type="text" name="horse_information[owner]" value="{{ $horse->owner }}"/>
                    </label>
                </div>
                    
                <div class="trainer_form">
                    <h4>調教師</h4>
                    <label>
                        <input type="text" name="horse_information[trainer]" value="{{ $horse->trainer }}"/>
                    </label>
                </div>
                
                <div class="producer_form">
                    <h4>生産者</h4>
                    <label>
                        <input type="text" name="horse_information[producer]" value="{{ $horse->producer }}"/>
                    </label>
                </div>
                
                <div class="birthday_form">
                    <h4>生年月日</h4>
                    <label>
                        <input type="text" name="horse_information[birthday]" value="{{ $horse->birthday }}"/>
                    </label>
                </div>
                
                <div class="winning_form">
                    <h4>主な勝ち鞍</h4>
                    <label>
                        <input type="text" name="horse_information[winning]" value="{{ $horse->winning }}"/>
                    </label>
                </div>
                
                <div class="form-submit">
                    <input type="submit" value="アップデート"/>
                </div>
            </form>
        </div>
@endsection