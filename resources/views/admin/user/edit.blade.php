@extends('layouts.admin')
@section('title', '選手情報の更新')

@section('content')
    <div class ="container">
        <div class ="row">
            <div class ="col-md-8 mx-auto">
                <h2>選手情報の編集</h2>
                <form action ="{{ action('Admin\UserController@update') }}" method ="post" enctype ="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">　{{-- old:自動で入れてあげる機能  --}}
                            <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="birthday">生年月日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="birthday" value="{{ $user_form->birthday }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"  for="temperature">体温</label>
                        <div class="col-md-3">
                            <select name=temperature step=0.1>
                                @for($number = 35.0; $number <= 40.1; $number=$number+0.1) {
                                    echo "<option value="{{ number_format($number, 1) }}">{{ number_format($number, 1) }}</option>";
                                    }
                                @endfor
                            </select>   
                        </div>
                        <label>℃</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="weight">体重</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="weight" step="0.1">
                        </div>
                        <label>kg</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理開始日</label>
                        <div class="col-md-3">
                            <input type="date" name="menstrual_period_s"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理終了日</label>
                        <div class="col-md-3">
                            <input type="date" name="menstrual_period_e"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="injury">ケガ情報</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="injury" rows="20">{{ $user_form->injury }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="avatar_image">
                            <div class="form-text text-info">
                                設定中: {{ $user_form->avatar_image }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

