@extends('layouts.app')
@section('content')
<div class="row justify-content-md-center">
    <div class="col">
        <div class="enter_letters__wrapper">
            <div class="enter_letters__wrapper__row">
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
            </div>
            <div class="enter_letters__wrapper__row">
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
            </div>
            <div class="enter_letters__wrapper__row">
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
            </div>
            <div class="enter_letters__wrapper__row">
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
            </div>
            <div class="enter_letters__wrapper__row">
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
            </div>
            <div class="enter_letters__wrapper__row">
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
                <input type="text" readonly />
            </div>

        </div>

        <div class="words_wrapper">
            <div class="words_wrapper__row">
                <span>й</span>
                <span>ц</span>
                <span>у</span>
                <span>к</span>
                <span>е</span>
                <span>н</span>
                <span>г</span>
                <span>ш</span>
                <span>щ</span>
                <span>з</span>
                <span>х</span>
                <span>ъ</span>
            </div>
            <div class="words_wrapper__row">
                <span>ф</span>
                <span>ы</span>
                <span>в</span>
                <span>а</span>
                <span>п</span>
                <span>р</span>
                <span>о</span>
                <span>л</span>
                <span>д</span>
                <span>ж</span>
                <span>э</span>
            </div>
            <div class="words_wrapper__row">
                <span>я</span>
                <span>ч</span>
                <span>с</span>
                <span>м</span>
                <span>и</span>
                <span>т</span>
                <span>ь</span>
                <span>б</span>
                <span>ю</span>
                <span id="clear_words">
                    <svg width="10px" height="10px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 6L18 18M18 6L6 18" stroke="#000000" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg></span>
            </div>
        </div>
    </div>
</div>
@endsection