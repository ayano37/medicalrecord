{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ユーザー登録')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class ="container">
        <div class ="row">
            <div class ="col-md-8 mx-auto">
                <h2>ユーザー登録</h2>
                <form action ="{{ action('Admin\UserController@create') }}" method ="post" enctype ="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" for="team_name">チーム名選択</label>
                        <div class = "col-md-10">
                            {{ Form::select('team_name', App\Team::selectlist(), old('team_name'), ['class' => 'form-control', 'id' => 'team_name', 'required' => 'required']) }}
                        </div>    
                    </div>        
                    <div class="form-group row">
                        <label class="col-md-3" for="name">名前</label>
                        <div class="col-md-10">　{{-- old:自動で入れてあげる機能  --}}
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="birthday">生年月日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="email">メールアドレス</label>
                        <div class="col-md-10">　{{-- old:自動で入れてあげる機能  --}}
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="password">パスワード</label>
                        <div class="col-md-10">　{{-- old:自動で入れてあげる機能  --}}
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for ="avatar_image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="avatar_image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection

