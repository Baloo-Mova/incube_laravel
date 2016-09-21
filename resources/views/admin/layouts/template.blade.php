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
        @include('admin.layouts.partials.head')
    </head>
    <body>
        <div id="container">
            @include('admin.layouts.partials.header')

            <div class="row" id="content">
                
                    <div class="col-md-2 col-sm-4">
                        @include('admin.layouts.partials.sidebar')
                    </div>     

                    <div class="col-md-10 col-sm-8 ">
                        @yield('content')
                    </div>
               
            </div>

            @include('admin.layouts.partials.footer')

        </div>
        @include('admin.layouts.partials.scripts')
    </body>
</html>
