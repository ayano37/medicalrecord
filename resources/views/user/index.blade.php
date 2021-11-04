@extends('layouts.app')

@section('sidebar')
    @@parent
    <div class=container>
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-6 mx-auto">
                    <div class="image">
                    @if ($headline->image_path)
                        <img width="320px" src="{{ asset('storage/image/' . $headline->image_path) }}">
                    @endif
                    </div>
                    <div class="name">
                        <h3>{{ $headline->name }}</h3>
                    </div>
                    <div>
                        <h3>{{ $headline->birthday->format('Y年m月d日') }}</h3>
                    </div>
                </div>
            </div>    
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-6 mx-auto">
                    <h1>My Page</h1>
                    <div class="date d-flex align-items-center">
                        <h4>{{ $headline->updated_at->format('Y年m月d日') }}</h4>
                    </div>
                    <div class="temperature d-flex align-items-center">
                        <h4>体温：{{ $headline->temperature }}</h4>
                    </div>
                    <div class="weight d-flex">
                        <h4>体重：{{ $headline->weight }}</h4>
                    </div>
                    <div class="menstrual_period_s d-flex">
                        <h4>生理開始日：{{ $headline->menstrual_period_s }}</h4>
                    </div>
                    <div class="menstrual_period_e d-flex">
                        <h4>生理終了日：{{ $headline->menstrual_period_e }}</h4>
                    </div>
                    <div class="injury d-flex">
                        <h4>ケガ情報：{{ str_limit($headline->injury,500) }}</h4>
                    </div>
                </div>
            </div>
        @endif    
        <hr color="#c0c0c0">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5 date d-flex align-items-center">
                        <h6>更新日：{{ $post->updated_at->format('Y年m月d日') }}</h6>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-secondary" href="{{ action('Admin\UserController@create', ['id' => $post->id]) }}">新規作成</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-secondary" href="{{ action('Admin\UserController@edit', ['id' => $post->id]) }}">編集</a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-secondary" href="{{ action('Admin\UserController@delete', ['id' => $post->id]) }}">削除</a>
                    </div>
                </div>
            </div>
        @endforeach
        <hr color="#c0c0c0">
    </div>    
@endsection