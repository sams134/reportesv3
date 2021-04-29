@extends('layouts.internal')
@section('content')
<div class="container body">
        <style>
               .info b{
                 margin-right: 50px;
               }
          </style>
            <div class="main_container">
              <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                   @include('inc.intsidebar')
                  <!-- /sidebar menu -->
                </div>
              </div>
      
              <!-- top navigation -->
                   @include('inc.intnavbar')
              <!-- /top navigation -->
      
      
      
              <!-- page content -->
              <div class="right_col" role="main">
              <br>
                    @include('inc.messages') <br>
                    @include('inc.titulo') <br>
      
                  
      
<canvas id="surge_canvas" width="600" height="420"></canvas>

              </div>
            </div></div>
            

<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/diagnostico/surgeGraph.js')}}"></script>

<script>
$(document).ready(function(){
    planoCartesiano(2000);
    horizontalLines();
    verticalLines();
    ejesPlano();
});
</script>