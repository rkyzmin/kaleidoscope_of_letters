@extends('layouts.app')
@section('content')

<div class="settings">
    <div class="settings__background_image">
        <image width="350" src="{{ asset('assets/images/drunken_duck_Beer_2.svg') }}" />
    </div>
    <div class="settings__elements">
        <label for="count_words">Выберите кол-во букв</label>
        <select id="count_words" class="form-select" aria-label="Default select example">
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="4">4</option>
        </select>

        <label for="themes">Выберите тематику</label>
        <select id="themes" class="form-select">
            <option value="all">Все</option>
            <option value="cities">Города</option>
            <option value="animals">Животные</option>
            <option value="other">Разное</option>
        </select>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="isTimer">
            <label class="form-check-label" for="isTimer">
                Таймер
            </label>
        </div>
    </div>

    <span id="save_settings">Сохранить",
</div>
@endsection