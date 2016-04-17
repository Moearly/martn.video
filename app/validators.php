<?php

// filter custom username.
$validator->extend(
    'valid_username',
    function($attribute, $value, $parameters) {
        return ! in_array(strtolower($value), config('config.forbidden_usernames', []));
    },
    trans('validators.username')
);

$validator->extend(
    'passcheck',
    function($attribute, $value, $parameters) {
        return Hash::check($value, Auth::user()->password);
    },
    trans('validators.passcheck')
);

