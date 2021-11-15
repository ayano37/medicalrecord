<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        {{-- windowsの基本ブラウザであるedgeに対応する --}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- 画面幅を小さくしたときに文字や画像の大きさを調整してくれるタグ --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
         {{-- 認証済みのユーザーがリクエストを送信しているか確認する --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Team Register</title>
        
        <!-- Fonts -->
         {{-- 処理スピードが早くなる --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles --> 
        {{-- Laravel標準で用意されているcssを読み込みます --}}
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    </head>
    <body>
        <div class="bg_test">
            <div class="bg_test-text">
                背景画像を設定します
            </div>
        </div>
    </body>
</html>    