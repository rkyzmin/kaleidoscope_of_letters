$(document).ready(function () {

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

});
