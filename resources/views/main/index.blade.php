@extends('layouts.app')
@section('content')

<div class="wrapper_start_page">
    <div class="wrapper_start_page__header">
        <div class="wrapper_start_page__header__items">
            <div class="wrapper_start_page__header__rules">
                <a href="game.html">
                    <image width="18" src="{{ asset('assets/images/icons/Info-Button.svg') }}" />
                </a>
            </div>
            <div class="wrapper_start_page__header__settings">
                <a href="{{ route('settings') }}">
                    <image width="20" src="{{ asset('assets/images/icons/applications-system.svg') }}" />
                </a>
            </div>
        </div>
    </div>
    <div class="wrapper_start_page__main">
        <div class="wrapper_start_page__main_image">
            <image width="350" src="{{ asset('assets/images/drunken_duck_Beer_2.svg') }}" />
        </div>

        <a href="{{ route('game') }}"><span id="go_to_game">ИГРАТЬ",</a>
    </div>
</div>

@endsection