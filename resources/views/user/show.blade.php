@extends('layouts.app')

@section('title', '個人ページ')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
            <div class="row">
                <div id="contents" class="col-sm-8">
                    <h1>My Page</h1>
                    <div class="date d-flex align-items-center">
                        <h4>{{ $date->format('Y年m月d日') }}</h4>
                        <ul>
                            <a class="btn btn-secondary" href="{{ action('Admin\UserController@add',["id"=>$user->id]) }}">本日の登録</a>
                        </ul>
                    </div>
                        <div class="temperature d-flex align-items-center">
                            <h4>体温：{{ $temperature->temperature }}{ number_format($temperature, 1) }}</h4>
                        </div>
                    @if(!is_null($weight))
                        <div class="weight d-flex">
                            <h4>体重：{{ $weight->weight }}</h4>
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
                </div>
                <div id="sidebar" class="col-sm-4">
                    <div class="image">
                        @if ($user->avatar_image)
                            <img width="320px" src="{{ asset('storage/image/' . $user->avatar_image) }}">
                        @endif
                    </div>
                    <div class="name mx-auto">
                        <h3>{{ $user->name }}</h3>
                    </div>
                    <div class="birthday mx-auto">
                        <h3>{{ $user->birthday }}</h3>
                    </div>
                </div>
            </div>
        <hr color="#c0c0c0">
            <div class="row">
                <div class="list-date col-md-12 mx-auto">
                    <div class="row">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th width="20%">{{ $date->year }}年</th>
                                    <th width="20%">{{ $date->month }}月</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach((array)$dates as $date)
                                    <th>{{ $date }}</th>
                                @endforeach
                                </tr>
                            <tbody>
                        </table>        
                    </div>
                </div>
            </div>
        <hr color="#c0c0c0">
    </div>    
@endsection