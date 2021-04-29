@extends('layouts.internal')

@section('content')
<div class="container body">
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
                  
            @if(Auth::user()->activo != 0)

              @include('examples.DASHONE')
            @else
              <h1> Usuario no activo </h1>
              <p> Debe de solicitar activar a este usuario. </p>
            @endif
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('inc.footer')
        <!-- /footer content -->
      </div>
    </div>

	
@endsection
