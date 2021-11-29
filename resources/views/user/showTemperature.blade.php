@extends('layouts.app')

@section('title', '体温一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div id="contents" class="col-md-12">
                <h1>体温一覧</h1>
                <div class="col-md-5">
                    <a class="btn btn-secondary" href="{{ action('UserController@show', ['id' => $user->id]) }}">Myページに戻る</a>    
                </div>
            </div>
            <div class="list-temperature col-md-12 mx-auto">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="15%">日付</th>
                            <th width="15%">体温</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($temperatures as $temperature)
                            @if(!($i % 4))
                            <tr>
                            @endif
                            <th width="12%">{{ $temperature->target_date }}</th>
                            <td width="12%">{{ $temperature->temperature }}</td>
                            @if(3 == ($i % 4))
                            </tr>
                            @endif
                            @php $i++; @endphp
                        @endforeach
                        @if($i % 4)
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection    