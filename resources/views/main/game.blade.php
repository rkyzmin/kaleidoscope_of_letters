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
    @for($i = 0; $i <= $letters['count']; $i++)
        <div class="words_wrapper__row">
        @foreach($letters['items'][$i] as $letter)
        @if ($i === 2 && $letter === end($letters['items'][$i]))
        <span id="clear_words" style="padding: 7px;background-color: gray;border-radius: 5px;margin-right: -1px;cursor: pointer;">
            <svg width="10px" height="10px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 6L18 18M18 6L6 18" stroke="#000000" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
        @else
        <span style="{{ $letters['style'] }}">{{ $letter }}</span>
        @endif
        @endforeach
</div>
@endfor
<h1 id="timer">00:00:00</h1>
</div>
<!--  -->
@section('script')
<script>
    $(document).ready(function() {

        function deleteWord(row) {
            let rowtiti = document.querySelectorAll('.enter_letters__wrapper__row')[row].querySelectorAll('input');
            //e.refresh();
            let arr = [];

            rowtiti.forEach((item) => {
                if (item.value.length === 1) {
                    arr.push(item)
                }
            });

            if (arr.length === 0) {
                return;
            }

            arr[arr.length - 1].value = "";
        }

        function checkLetter(e, row) {
            let items = document.querySelectorAll('.enter_letters__wrapper__row')[row].querySelectorAll('input');

            if (items[0].value.trim() === "") {
                items[0].value = e.target.textContent;
            } else if (items[1].value.trim() === "") {
                items[1].value = e.target.textContent;
            } else if (items[2].value.trim() === "") {
                items[2].value = e.target.textContent;
            } else if (items[3].value.trim() === "") {
                items[3].value = e.target.textContent;
            } else if (items[4].value.trim() === "") {
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
                    window.location.replace("/public/result");
                    localStorage.setItem('result', 'true');
                    let timer = document.querySelector('#timer').textContent;
                    localStorage.setItem('time', timer);
                }, 1000);
            } else if (rowId === 5) {
                setTimeout(() => {
                    window.location.replace("/public/result");
                    localStorage.setItem('result', 'false');
                    let timer = document.querySelector('#timer').textContent;
                    localStorage.setItem('time', timer);
                    // window.location.reload();
                }, 1000);
            }
        }

        const rndInt = randomIntFromInterval(0, 3);

        var letters = [
            'буква',
            'бабка',
            'ворон',
            'шутка',
            'роман',
            'мария',
            'пугач',
            'рубль',
            'сарай',
            'число',
            'удача',
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

                    ///console.log(item.id);

                    if (item.id === 'clear_words') {
                        deleteWord(rowId)
                    } else {
                        checkLetter(e, rowId)
                    }
                });
            });
        }


        let timer = document.getElementById('timer');
        let startBtn = document.getElementById('startBtn');
        let pauseBtn = document.getElementById('pauseBtn');
        let resetBtn = document.getElementById('resetBtn');

        let seconds = 0;
        let minutes = 0;
        let hours = 0;
        let interval;

        function updateTime() {
            seconds++;
            if (seconds === 60) {
                minutes++;
                seconds = 0;
            }
            if (minutes === 60) {
                hours++;
                minutes = 0;
            }
            timer.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        interval = setInterval(updateTime, 1000);
        startBtn.disabled = true;
        pauseBtn.disabled = false;
        resetBtn.disabled = false;

    });
</script>
@endsection
@endsection