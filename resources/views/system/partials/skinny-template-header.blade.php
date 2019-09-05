<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap-wizard-master/assets/js/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap-wizard-master/assets/js/jquery.bootstrap.wizard.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap-wizard-master/assets/js/gsdk-bootstrap-wizard.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/92136ae7d1.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-wizard-master/assets/css/gsdk-bootstrap-wizard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <main class="py-4">