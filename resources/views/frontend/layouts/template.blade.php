<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ "InCube відкрита регіональна платформа" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="google-site-verification" content="fG32qWPLYapE1OwmX6ierrdlpnjcFo-rwDWLCR0OLkc" />
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
        @include('frontend.layouts.partials.scripts')
    </body>
</html>
