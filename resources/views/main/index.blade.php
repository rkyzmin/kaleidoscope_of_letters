@extends('layouts.app')
@section('content')

<div class="wrapper_start_page">
    @if ($userId)
    <input id="tg_user_id" type="hidden" value="{{ $userId }}" />
    @endif;
    <div class="wrapper_start_page__header">
        <div class="wrapper_start_page__header__items">
            <div class="wrapper_start_page__header__rules">
                <a href="game.html">
                    <image width="18" src="{{ asset('assets/images/icons/Info-Button.svg') }}" />
                </a>
            </div>
            <div class="wrapper_start_page__header__settings">
                <a href="{{ route('settings', ['userId' => $userId]) }}">
                    <image width="20" src="{{ asset('assets/images/icons/applications-system.svg') }}" />
                </a>
            </div>
        </div>
    </div>
    <div class="wrapper_start_page__main">
        <div class="wrapper_start_page__main_image">
            <image width="350" src="{{ asset('assets/images/drunken_duck_Beer_2.svg') }}" style="margin: auto;display: table;" />
        </div>

        <a href="{{ route('game', ['userId' => $userId]) }}"><span id="go_to_game">ИГРАТЬ</a>
    </div>
</div>
@section('script')
<script>
     $(document).ready(function() {
        let tgUserId = document.querySelector('#tg_user_id');
        if (tgUserId) {
            localStorage.setItem('tg_user_id', tgUserId.value);
        }
     });
     
</script>
@endsection
@endsection