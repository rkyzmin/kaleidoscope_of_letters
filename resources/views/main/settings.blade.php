@extends('layouts.app')
@section('content')
<div class="settings">
    {{-- <input id="tg_user_id" type="hidden" value="{{ $userId }}" /> --}}
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
        <select id="theme" class="form-select">
            <option value="all">Все</option>
            <option value="cities">Города</option>
            <option value="animals">Животные</option>
            <option value="other">Разное</option>
        </select>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="" id="is_timer">
                Таймер
            </label>
        </div>
    </div>

    <span id="save_settings">Сохранить</span>
</div>
@section('script')
<script>
    document.querySelector('#save_settings').addEventListener('click', () => {
        let countWords = document.querySelector('#count_words').value;
        let theme = document.querySelector('#theme').value;
        let isTimer = document.querySelector('#is_timer').checked;

        let params = new URLSearchParams(document.location.search);
        let tgUserId = params.get('userId');

        $.ajax({
            type: 'post',
            url: "{{ route('save_settings') }}",
            data: {
                'count_words': countWords,
                'theme': theme,
                'is_timer': isTimer,
                'user_id': tgUserId,
                "_token": "{{ csrf_token() }}",
            },
            success: function(info) {
                console.log(info);
            }
        });
    });
</script>
@endsection
@endsection