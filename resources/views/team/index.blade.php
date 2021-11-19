@extends('layouts.app')

@section('title', 'チームページ一覧ページ')

@section('content')
    <div class="container">
        <div class="row">
            <h2>登録チーム一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-secondary" href="{{ action('Admin\TeamController@add') }}">新規作成</a>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="50%">チーム名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <th>{{ $team->id }}</th>
                                    <td>{{ \Str::limit($team->team_name, 50) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection