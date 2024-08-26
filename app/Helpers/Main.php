<?php

namespace App\Helpers;

class Main 
{
    public static function getLetters()
    {
        $letters = [
            'class' => 'words_wrapper__row',
            'count' => 2,
            'style' => 
            'padding: 7px;
            background-color: gray;
            border-radius: 5px;
            margin-right: -1px;
            cursor: pointer;',

            'items' => [
                [
                    "й","ц","у","к","е","н","г","ш","щ","з","х","ъ",
                ],
                [
                    "ф","ы","в", "а","п","р","о","л","д","ж","э",
                ],
                [
                    "я","ч","с","м","и","т","ь","б","ю", "X",
                ]
            ],
        ];

        return $letters;
    }

    public static function getInputWords()
    {

        $rows = [
            'class' => 'enter_letters__wrapper__row',
            'count' => 6,
            'items' => [
                'count' => 5,
                'style' => 'width: 55px;height: 55px; font-size: 20px; font-weight: 500; text-align: center;',
            ],
        ];

        return $rows;
    }
}