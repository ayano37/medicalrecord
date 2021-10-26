@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
            @foreach($posts as $post)
            <div class="row row-height">
                <div class="post col-md-7 ">
                    <div class="team_name">
                        <h1>{{ str_limit($post->team_name, 150) }}</h1>
                    </div>
                <hr color="#c0c0c0">     
                </div>
                <div class="col-md-5">
                    <div class="image">
                        @if ($post->image_path)
                            <img width="320px" src="{{ asset('storage/image/' . $post->image_path) }}">
                        @endif
                    </div>
                <hr color="#c0c0c0">     
                </div>
                <div class="col-md-5">
                    <div class="player_name">
                        <h4><選手名></h4>
                        <div>
                            {!! nl2br($post->player_name) !!}
                        </div>  {{-- <a href="{{ action('Admin\TeamController@edit'['id' => $post->player_name]) }}"></a> --}}
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="game_day">
                        <h4><試合日程></h4>
                        {!! nl2br($post->game_day) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <hr color="#c0c0c0">
                    <div class=row>
                        <div class="col-md-5 date">
                            <h6>更新日：{{ $post->updated_at->format('Y年m月d日') }}</h6>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary" href="{{ action('Admin\TeamController@create', ['id' => $post->id]) }}">新規作成</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ action('Admin\TeamController@edit', ['id' => $post->id]) }}">編集</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ action('Admin\TeamController@delete', ['id' => $post->id]) }}">削除</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <hr color="#c0c0c0">
    </div>
@endsection