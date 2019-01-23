<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Trang chủ TPACK</title>
        <base href="{{ asset('') }}">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css"> -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="assets/css/login/main.css">
        <link rel="stylesheet" href="assets/css/login/util.css">
        <link rel="stylesheet" href="assets/css/jquery-comments.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.css"> -->
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <!-- include the style alertify-->
        <link rel="stylesheet" href="bower_components/alertifyjs/css/alertify.min.css" />
        <!-- include a theme alertify-->
        <link rel="stylesheet" href="bower_components/alertifyjs/css/themes/default.min.css" />
       <!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>    -->
        <!-- <link rel="stylesheet" href="bower_components/fontawesome-free-5.6.3-web/css/all.css"> -->
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
          <example-component></example-component>
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
        <script>
             new WOW().init();
        </script>
        <!-- <script src="js/popper.min.js"></script> -->
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <!-- <script src="bower_components/popper.js/dist/popper1.12.js"></script> -->
        
        <!-- <script src="assets/datatable/dataTables.bootstrap4.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>   

        <script src="assets/js/pikeadmin.js"></script>
         <!-- include a js alertify-->
        <script src="bower_components/alertifyjs/alertify.min.js"></script>
        <!-- <script>
            
        </script> -->
    </body>
</html>
