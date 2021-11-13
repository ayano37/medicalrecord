@extends('layouts.admin')
@section('title', '選手情報の編集')

@section('content')
    <div class ="container">
        <div class="form-group row">
            <div class ="col-md-8 mx-auto">
                <h2>選手情報の編集</h2>
                <form action ="{{ action('Admin\UserController@update',["id"=>$user_form->id]) }}" method ="post" enctype ="multipart/form-data">
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
                            <input type="text" class="form-control" name="weight" step="0.1" value="{{ $user_form->weight }}">
                        </div>
                        <label>kg</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理開始日</label>
                        <div class="col-md-3">
                            <input type="date" name="menstrual_period_s" value="{{ $user_form->menstrual_period_s }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理終了日</label>
                        <div class="col-md-3">
                            <input type="date" name="menstrual_period_f" value="{{ $user_form->menstrual_period_f }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="injury">ケガ情報</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="injury" rows="20">{{ $user_form->injury }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $user_form->id}}">
                            {{ csrf_field() }}
                            {{-- ヘルパー関数optionalは渡されたオブジェクトに対しis_objectが真の場合はオブジェクトとプロパティを渡し、nullの場合は例外を回避してくれる --}}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection