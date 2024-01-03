<?php

// Url: https://github.com/brian2694/laravel-toastr
// Toastr::info('mensagem', 'título', ['opções']);
// Toastr::success('mensagem', 'título', ['opções']);
// Toastr::warning('mensagem', 'título', ['opções']);
// Toastr::error('mensagem', 'título', ['opções']);
// Toastr::clear();
// Toastr()->info('mensagem', 'título', ['opções']);
// Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

return [
    'options' => [
        "closeButton" => true,
        "debug" => true,
        "newestOnTop" => false,
        "progressBar" => true,
        "positionClass" => "toast-top-right",
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ],
];
