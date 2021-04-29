<link type="text/css" rel="stylesheet" href="{{asset('vendors/lightgallery/dist/css/lightgallery.css')}}" /> 

<div id="aniimated-thumbnials">

    @foreach($motor->fotos as $foto)    
        <a href="{{$foto->foto}}">  <img src="{{$foto->foto}}" style="max-width:200px"/>  </a>
    @endforeach
</div>

<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendors/lightgallery/dist/js/lightgallery.js')}}"></script>
<script src="{{asset('vendors/lightgallery/dist/modules/lg-thumbnail.js')}}"></script>

<script>
$(document).ready(function() {
 
 
 $('#aniimated-thumbnials').lightGallery({
    thumbnail:true
});
    });
    </script>