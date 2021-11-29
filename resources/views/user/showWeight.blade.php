@extends('layouts.app')

@section('title', '体重グラフ')

@section('content')
    <div class="container">
        <div class="row">
            <div id="contents" class="col-md-12">
            <h1>体重グラフ</h1>
            <div class="col-md-5">
                <a class="btn btn-secondary" href="{{ action('UserController@show', ['id' => $user->id]) }}">Myページに戻る</a>    
            </div>
        	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        	<div class="chart-container" style="position: relative; width: 100%; height: 200px;">
            	<canvas id="myChart"></canvas>
            </div>
        	<script>
        		window.onload = function() {
            	
            	//ラベル
            	var labels = @json($date_log);
            	
            	//体重ログ
            	var weight_log = @json($weight_log);
            	
            	//グラフを描画
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
            		type: 'line',
            		data : {
            			labels: labels,
            			datasets: [
            				{
            					label: '体重',
            					data: weight_log,
            					borderColor: "rgba(0,0,255,1)",
                     			backgroundColor: "rgba(0,0,0,0)"
            				},
            			]
            		},
            		//グラフの設定
            		options: {
            			title: {
            				display: true,
            				text: '月体重'
            			}
            		}
                });
            	    
            	};
            </script>
            </div>
        </div>
    </div>
@endsection    
            