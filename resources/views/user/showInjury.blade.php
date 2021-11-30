@extends('layouts.app')

@section('title', 'ケガ情報一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div id="contents" class="col-md-12">
                <h1>ケガ情報一覧</h1>
                <div class="col-md-5 py-2">
                    <a class="btn btn-secondary btn-sm" href="{{ action('UserController@show', ['id' => $user->id]) }}">Myページに戻る</a>    
                </div>
            </div>
            <div class="list-temperature col-md-12 mx-auto">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">日付</th>
                            <th width="50%">ケガ情報</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($injuries as $injury)
                            <tr>
                                <th>{{ $injury->target_date }}</th>
                                <td>{{ \Str::limit($injury->injury, 500) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection    