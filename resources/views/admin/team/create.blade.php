{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'チーム情報の更新')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class ="container">
        <div class ="row">
            <div class ="col-md-8 mx-auto">
                <h2>チーム情報の更新</h2>
                <form action ="{{ action('Admin\TeamController@create') }}" method ="post" enctype ="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-2" for="team_name">チーム名</label>
                        <div class="col-md-10">　{{-- old:自動で入れてあげる機能  --}}
                            <input type="text" class="form-control" name="team_name" value="{{ old('team_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="game_day">試合日程</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="game_day" rows="20">{{ old('game_day') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for ="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection

