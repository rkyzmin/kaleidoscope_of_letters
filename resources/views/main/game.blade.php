@extends('layouts.app')
@section('content')

<div class="enter_letters__wrapper">
    @for($i = 0; $i < $rows['count']; $i++)
        <div class="{{ $rows['class'] }}">
        @for($j = 0; $j
        < $rows['items']['count']; $j++)
            <input type="text" readonly style="{{ $rows['items']['style'] }}" />
        @endfor
</div>
@endfor
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
        <span>хуй</span>
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
@section('script')
<script>
    $(document).ready(function() {

        function checkLetter(e, row) {
            let items = document.querySelectorAll('.enter_letters__wrapper__row')[row].querySelectorAll('input');

            if (items[0].value === "") {
                items[0].value = e.target.textContent;
            } else if (items[1].value === "") {
                items[1].value = e.target.textContent;
            } else if (items[2].value === "") {
                items[2].value = e.target.textContent;
            } else if (items[3].value === "") {
                items[3].value = e.target.textContent;
            } else if (items[4].value === "") {
                items[4].value = e.target.textContent;
            }

            if (items[4].value !== "") {
                //console.log(letter);
                items.forEach((word, index) => {
                    if (letter[index] === word.value) {
                        word.classList.add('success');

                        document.querySelectorAll('.words_wrapper__row span').forEach(p => {
                            if (p.textContent.includes(word.value)) {
                                p.classList.add('middle-word');
                            }
                        });

                    } else {
                        for (let i = 0; i < letter.length; i++) {
                            if (letter[i] === word.value) {
                                word.classList.add('middle');
                                document.querySelectorAll('.words_wrapper__row span').forEach(p => {
                                    if (p.textContent.includes(word.value)) {
                                        p.classList.add('middle-word');
                                    }
                                });
                            }
                        }
                    }
                });

                checkResultItems(row);
            }
        }

        function randomIntFromInterval(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }

        function checkResultItems(rowId) {

            let lengthSuccess = document.querySelectorAll('.enter_letters__wrapper__row')[rowId].querySelectorAll('.success').length;

            if (lengthSuccess === 5) {
                setTimeout(() => {
                    window.location.replace("/result");
                    // localStorage.setItem('result', 'true')
                }, 1000);
            } else if (rowId === 5) {
                setTimeout(() => {
                    window.location.replace("/result");
                    // localStorage.setItem('result', 'false')
                    // window.location.reload();
                }, 1000);
            }
        }

        const rndInt = randomIntFromInterval(0, 3);

        var letters = [
            'буква',
            'бабка',
            'ворон',
            'шутка'
        ];

        var letter = letters[rndInt]

        let wordsWrapperRowItems = document.querySelectorAll('.words_wrapper__row span');
        if (wordsWrapperRowItems) {
            wordsWrapperRowItems.forEach((item) => {
                item.addEventListener('click', (e) => {
                    let rows = document.querySelectorAll('.enter_letters__wrapper__row');
                    let rowId = 0;

                    rows.forEach((row, i) => {
                        let els = row.querySelectorAll('input')
                        if (els[4].value !== "") {
                            rowId += 1;
                        }
                    });

                    if (rowId > 5) {
                        return;
                    }

                    checkLetter(e, rowId)

                });
            });
        }

        let clearWords = document.querySelector('#clear_words');
        if (clearWords) {
            document.querySelector('#clear_words').addEventListener('click', () => {
                let items = document.querySelectorAll('.enter_letters__wrapper input');
                items.forEach((item) => {
                    item.value = "";
                });
            });
        }

        // let resultGame = document.querySelector('#result_game');
        // if (resultGame) {
        //     if (localStorage.getItem('result') === "true") {
        //         document.querySelector('#result_game').innerHTML = 'Вы выиграли';
        //     } else {
        //         document.querySelector('#result_game').innerHTML = 'Вы проиграли';
        //     }
        // }
    });
</script>
@endsection
@endsection