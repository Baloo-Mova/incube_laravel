<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ "InCube открытая региональная платформа" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        @include('frontend.layouts.partials.head')
    </head>
    <body>
        <div id="container">
            @include('frontend.layouts.partials.header')

            <div id="content">
                @yield('content')
            </div>

            @include('frontend.layouts.partials.footer')

        </div>
        <script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>
        @include('frontend.layouts.partials.scripts')
    </body>
</html>