@extends('layouts.app')

@section('title', '生理日一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div id="contents" class="col-md-12">
                <h1>生理日一覧</h1>
                <div class="col-md-5 py-2">
                    <a class="btn btn-secondary btn-sm" href="{{ action('UserController@show', ['id' => $user->id]) }}">Myページに戻る</a>    
                </div>
            </div>
            <div class="list-menstrual_period col-md-8 mx-auto">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th width="20%"><div class="text-center">生理開始日</div></th>
                            <th width="20%"><div class="text-center">生理終了日</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menstrual_periods as $menstrual_period)
                        @if(isset($menstrual_period->menstrual_period_s) || isset($menstrual_period->menstrual_period_f))
                            <tr>
                                <td>
                                    <div class="text-center">
                                    {{ $menstrual_period->menstrual_period_s }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                    {{ $menstrual_period->menstrual_period_f }}
                                    </div>
                                </td>
                            </tr>
                        @endif    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection    