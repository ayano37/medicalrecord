@extends('layouts.app')

@section('title', '個人ページ')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
            <div class="row">
                <div id="contents" class="col-sm-8">
                    <h1>My Page</h1>
                    <div class="date d-flex align-items-center">
                        <h4>{{ $today->format('Y年m月d日') }}</h4>
                    </div>
                    <form action ="{{ action('UserController@show',["id"=>$user->id]) }}" method ="get">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <input type="date" name="target_date" value="{{ $target_date }}">
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-secondary" type="submit" value="日付変更">
                            </div>
                        </div> 
                    </form>
                    @if(!is_null($temperature))
                        <div class="temperature d-flex align-items-center">
                            <h4>体温：{{ $temperature->temperature }}℃</h4>
                            <a class="btn btn-secondary" href="{{ action('UserController@showTemperature',['id'=>$user->id]) }}">体温一覧</a>
                        </div>
                    @endif    
                    @if(!is_null($weight))
                        <div class="weight d-flex">
                            <h4>体重：{{ $weight->weight }}kg</h4>
                            <a class="btn btn-secondary" href="{{ action('UserController@showWeight',['id'=>$user->id]) }}">体重グラフ</a>
                        </div>
                    @endif
                    @if(!is_null($menstrual_period_s))
                        <div class="menstrual_period_s d-flex">
                            <h4>生理開始日：{{ $menstrual_period_s->menstrual_period_s }}</h4>
                        </div>
                    @endif
                    @if(!is_null($menstrual_period_f))
                        <div class="menstrual_period_e d-flex">
                            <h4>生理終了日：{{ $menstrual_period_f->menstrual_period_f }}</h4>
                        </div>
                    @endif
                    @if(!is_null($injury))
                        <div class="injury d-flex">
                            <h4>ケガ情報：{{ str_limit($injury->injury,500) }}</h4>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-secondary" href="{{ action('Admin\UserController@add',['id'=>$user->id]) }}">本日の登録</a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-secondary" href="{{ action('Admin\UserController@edit', ['id' => $user->id,'target_date' => $target_date]) }}">編集</a>    
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-secondary" href="{{ action('TeamController@show', ['id' => $user->team_id]) }}">チームページに戻る</a>    
                        </div>
                    </div>
                </div>
                <div id="sidebar" class="col-sm-4">
                    <div class="image">
                        @if ($user->avatar_image)
                            <img width="320px" src="{{ asset('storage/image/' . $user->avatar_image) }}">
                        @endif
                    </div>
                    <div class="name mx-auto">
                        <h3>名前：{{ $user->name }}</h3>
                    </div>
                    <div class="birthday mx-auto">
                        <h3>生年月日：{{ $user->birthday }}</h3>
                    </div>
                </div>
            </div>
        <hr color="#c0c0c0">
    </div>    
@endsection