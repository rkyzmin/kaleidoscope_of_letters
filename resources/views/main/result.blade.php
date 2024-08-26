@extends('layouts.app')
@section('content')
<div class="wrapper__result">
    <span id="result_game"></span>
    <br />
    <span id="time"></span>

    <image width="350" src="{{ asset('assets/images/icons/dobi.gif') }}" />
    <a href="{{ route('game', ['userId' => $userId]) }}">
        <button id="reload_game">Повторить игру</button>
    </a>
    <a href="#table_show" id="show_result">Посмотреть результаты</a>

    <table id="table_show" class="hidden">
        <thead>
            <tr>
                <th scope="col">Слово</th>
                <th scope="col">Время</th>
                <th scope="col">Результат</th>
            </tr>
        </thead>

        @foreach($resultData as $data)
        <tr>
            <td>{{ $data['word'] }}</th>
            <td>{{ $data['time'] }}</td>
            <td>{{ $data['this'] }}</td>
        </tr>
        @endforeach
    </table>
</div>

<style>
    table {
        margin: auto;
        position: absolute;
        top: 170%;
        left: 50%;
        font-size: 20px;
        width: 70%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }

    th, td {
        padding: 10px;
    }

    .wrapper__result {
        display: table;
        margin: auto;
        position: relative;
    }

    #reload_game {
        text-align: center;
        background-color: darkorchid;
        color: white;
        border-radius: 5px;
        padding: 5px;
        border: 0;
        font-size: 25px;
        cursor: pointer;
        position: absolute;
        top: 70%;
        left: 50%;
        font-size: 20px;
        width: 70%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }

    #result_game {
        font-weight: bold;
        font-size: 25px;
        cursor: pointer;
        position: absolute;
        top: 10%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }

    #time {
        font-size: 25px;
        cursor: pointer;
        position: absolute;
        top: 30%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }

    #show_result {
        position: absolute;
        bottom: 0;
        left: 50%;
        font-size: 20px;
        width: 70%;
        font-size: 19px;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .hidden {
        display: none;
    }
</style>

@section('script')
<script>
    $(document).ready(function() {

        let resultGame = document.querySelector('#result_game');
        if (resultGame) {
            if (localStorage.getItem('result') === "true") {
                document.querySelector('#result_game').innerHTML = 'Вы выиграли';
            } else {
                document.querySelector('#result_game').innerHTML = 'Вы проиграли';
            }

            let time = localStorage.getItem('time');
            if (time) {
                document.querySelector('#time').innerHTML = localStorage.getItem('time');
            }
        }

        let showResult = document.querySelector('#show_result');
        showResult.addEventListener('click', (e) => {
            document.querySelector('#table_show').classList.toggle('hidden');
        });
    });
</script>
@endsection
@endsection