@extends('layouts.app')
@section('content')
<div>
    <span id="result_game"></span>
    <br />
    <span id="time"></span>

    <image width="350" src="{{ asset('assets/images/icons/dobi.gif') }}" />
</div>

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
    });
</script>
@endsection
@endsection