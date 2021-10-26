@extends('layouts.admin')
@section('title', 'チーム情報の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>チーム情報の編集</h2>
                <form action="{{ action('Admin\TeamController@update') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-2" for="team_name">チーム名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="team_name" value="{{ $team_form->team_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="player_name">選手一覧</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="player_name" rows="20">{{ $team_form->player_name }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="game_day">試合日程</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="game_day" rows="20">{{ $team_form->game_day }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $team_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $team_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection