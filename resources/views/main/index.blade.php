@extends('layouts.app')
@section('content')
<div class="container">
    <div class="enter_letters__wrapper">
        @foreach([1, 2, 3, 4, 5, 5] as $row)
        <div class="enter_letters__wrapper__row">
            <input type="text" readonly />
            <input type="text" readonly />
            <input type="text" readonly />
            <input type="text" readonly />
            <input type="text" readonly />
        </div>
        <br />
        @endforeach
    </div>

    <div class="words_wrapper">
        <div class="words_wrapper__row">
            <span>й</span>
            <span>ц</span>
            <span>у</span>
            <span>к</span>
            <span>е</span>
            <span>ё</span>
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
        </div>
    </div>


    <br />
    <span id="clear_words">Отчистить все</span>
</div>
<style>
    .words_wrapper {
        margin-top: 25px;
    }

    .enter_letters__wrapper {
        margin-top: 25px;
    }

    .words_wrapper__row {
        margin-bottom: 9px;
        color: white;
    }

    .words_wrapper__row span {
        padding: 4px;
        background-color: gray;
        border-radius: 5px;
        margin-right: 2px;
        cursor: pointer;
    }

    .enter_letters__wrapper input {
        width: 25px;
        margin-left: 5px;
        border-radius: 5px
    }

    .success {
        background-color: green;
    }

    .middle {
        background-color: gray;
    }

    .middle-word {
        background-color: red !important;
    }
</style>

@endsection
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


            }
        }

        function randomIntFromInterval(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }

        const rndInt = randomIntFromInterval(0, 3);

        var letters = [
            'буква',
            'бабка',
            'ворон',
            'шутка'
        ];

        var letter = letters[rndInt]


        document.querySelectorAll('.words_wrapper__row span').forEach((item) => {
            item.addEventListener('click', (e) => {
                let rows = document.querySelectorAll('.enter_letters__wrapper__row');
                let rowId = 0;

                rows.forEach((row, i) => {
                    let els = row.querySelectorAll('input')
                    if (els[4].value !== "") {
                        rowId += 1;
                    }
                });

                if (rowId === 5) {
                    return;
                }

                checkLetter(e, rowId)

                let lengthSuccess = document.querySelectorAll('.enter_letters__wrapper__row')[rowId].querySelectorAll('.success').length;

                if (lengthSuccess === 5) {
                    setTimeout(() => {
                        alert('Win')
                        window.location.reload();
                    }, 2000);
                }

                //console.log(elements); //проверить ряд, если в очередном ряду на последней букве закончилось все, переходим на другой

            });
        });

        document.querySelector('#clear_words').addEventListener('click', () => {
            let items = document.querySelectorAll('.enter_letters__wrapper input');
            items.forEach((item) => {
                item.value = "";
            });
        });
    });
</script>
@endsection