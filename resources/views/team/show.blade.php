@extends('layouts.front')

@section('title', 'チームページ')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
            <div class="row">
                <div class="col-md-7 mx-auto d-flex align-items-center">
                    <div class="team_name">
                        <h1>{{Str::limit ($team->team_name,50) }}</h1>
                    </div>
                </div>
                <div class="col-md-5 mx-auto">
                    <div class="image">
                        @if ($team->image_path)
                            <img width="320px" src="{{ asset('storage/image/' . $team->image_path) }}">
                        @endif
                    </div>
                </div>
            </div>
            <hr color="#c0c0c0">
            <div class="row">
                <div class="col-md-5">
                    <div class="player_name">
                        <h4><選手名></h4>
                        <div>
                            @foreach($users as $user)
                            <a href="{{ action('UserController@show',['id' => $user->id]) }}">{!! nl2br($user->name) !!}</a>
                            @endforeach
                        </div> 
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="game_day">
                        <h4><試合日程></h4>
                        {!! nl2br($team->game_day) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <hr color="#c0c0c0">
                    <div class="row">
                        <div class="col-md-5 date d-flex align-items-center">
                            <h6>更新日：{{ $team->updated_at->format('Y年m月d日') }}</h6>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-secondary" href="{{ action('Admin\TeamController@edit', ['id' => $team->id]) }}">編集</a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-secondary" href="{{ action('Admin\TeamController@delete', ['id' => $team->id]) }}">削除</a>
                        </div>
                    </div>
                </div>
            </div>
        <hr color="#c0c0c0">
    </div>
@endsection