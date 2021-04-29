<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/internal.css') }}" rel="stylesheet">
   
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendors/normalize-css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

    
    <link type="text/css" rel="stylesheet" href="{{asset('vendors/lightgallery/dist/css/lightgallery.css')}}" /> 
    <link href="{{asset('css/select.css')}}" rel="stylesheet">

      
    <style>
    

#lightbox .modal-content {
    display: inline-block;
    text-align: center;   
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    
    z-index:1032;
}
</style>

</head>
<body class="nav-md">
    <div class="container-fluid body ">
       
        @yield('content')
        
    </div>


    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

        <!-- jQuery -->
    
    <script src="{{asset('js/select.js')}}"> </script>
    
    
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>


    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    
    <!-- JQVMap -->
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    
    
    <script src="{{asset('vendors/ion.rangeSlider/js/ion.rangeSlider.js')}}"></script>
    <!-- upload -->
    
    <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>

    <!-- bootstrap-datetimepicker -->    
    

    
    


    <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
 <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
 <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('vendors/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <script src="{{asset('vendors/lightgallery/dist/js/lightgallery.js')}}"></script>
<script src="{{asset('vendors/lightgallery/dist/modules/lg-thumbnail.js')}}"></script>
<script src="{{asset('js/jquery.uploadPreview.js')}}"></script>
 

        
<script>
        $("#drop").click(function(e){
            e.preventDefault();
                $("#menu_top").slideToggle();
            return false;
        })
        $(window).click(function(e){
            $("#menu_top").hide(400);
        })
    </script>
</body>
</html>
