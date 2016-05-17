<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <title>Url Shortner | @yield('head')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- css -->

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        @yield('css')
       
    </head>  
    <body>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                
                @yield('breadcrumb')
                <!-- Main content -->
                <section class="content">
                    @if (Session('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session('error') }}<br />
                            @foreach ($errors->all() as $message)
                            {{ $message }} <br />
                            @endforeach
                        </div>
                    @endif

                    @if (Session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div> 

        <!-- javascript --> 

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <!-- bootstrap js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        @yield('js')
    </body>
</html>