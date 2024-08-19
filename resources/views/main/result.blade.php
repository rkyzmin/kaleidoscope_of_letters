@extends('layouts.app')
@section('content')
<div><span id="result_game"></span></div>

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
        }
    });
</script>
@endsection
@endsection