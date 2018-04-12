<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Тестовое задание для Resultant</title>
    </head>
    <body>
        <div id="app">
            <page-index></page-index>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
