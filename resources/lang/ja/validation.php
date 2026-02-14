<?php

return [

    'required' => ':attribute は必須項目です。',
    'integer' => ':attribute は整数で入力してください。',
    'min' => [
        'numeric' => ':attribute は :min 以上で入力してください。',
    ],
    'date' => ':attribute は正しい日付を入力してください。',
    'in' => ':attribute の値が不正です。',
    'exists' => '選択された :attribute が存在しません。',

    'attributes' => [
        // Transaction
        'category_id' => 'カテゴリ',
        'type' => '種別',
        'amount' => '金額',
        'date' => '日付',
        'note' => 'メモ',

        // Category
        'name' => 'カテゴリ名',
    ],

];
