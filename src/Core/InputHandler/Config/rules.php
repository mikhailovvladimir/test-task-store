<?php

return [
    'required' => [
        'method' => 'isRequired',
        'message' => 'Поле {field}, не заполненно'
    ],

    'string' => [
        'method' => 'isString',
        'message' => 'Поле {field} не является строкой, либо заполненно не корректно',
    ],

    'integer' => [
        'method' => 'isString',
        'message' => 'Поле {field} не является числом',
    ]
];