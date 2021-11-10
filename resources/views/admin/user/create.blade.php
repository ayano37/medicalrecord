{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '選手情報の登録')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class ="container">
        <div class="form-group row">
            <div class ="col-md-8 mx-auto">
                <h2>選手情報の更新</h2>
                <form action ="{{ action('Admin\UserController@create',["id"=>$user->id]) }}" method ="post" enctype ="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2"  for="temperature">体温</label>
                        <div class="col-md-3">
                            <select name=temperature step=0.1>
                            @for($number = 35.0; $number <= 40.1; $number=$number+0.1) {
                                echo "<option value="{{ number_format($number, 1) }}">{{ number_format($number, 1) }}</option>";}
                            @endfor
                            </select> 
                            <label>℃</label>
                        </div>
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
                            <input type="date" name="menstrual_period_f"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="injury">ケガ情報</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="injury" rows="20">{{ old('injury') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{($user)->id}}">
                    {{-- ヘルパー関数optionalは渡されたオブジェクトに対しis_objectが真の場合はオブジェクトとプロパティを渡し、nullの場合は例外を回避してくれる --}}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection    