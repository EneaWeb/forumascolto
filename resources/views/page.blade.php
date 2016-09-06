@extends('frontend.layout.main')
@section('content')
    
    @include('frontend.layout.nav_menu')
    
    <style>
        p {
            text-align:justify;
        }
    </style>

    <div style="height:120px"></div>
    <section class="" style="min-height:90vh">
        <div class="container">
            
            <!-- SECTION HEADER -->
            <div class="section-header">
                
                <!-- SECTION TITLE -->
                <h2 class="dark-text">{!! isset($page) ? $page->title : '<i>Pagina non trovata</i>' !!}</h2>
                
                <!-- SHORT DESCRIPTION ABOUT THE SECTION -->
                <div class="col-md-12">
                <br><br>
                    <h6 style="font-size:15px; padding: 50px 0px; max-width:800px; margin-left:auto; margin-right:auto; text-align:left; text-align:justify">
                        {!! isset($page) ? $page->content : '' !!}
                    </h6>
                </div>

            </div>
            <!-- / END SECTION HEADER -->

        </div> <!-- / END CONTAINER -->
    </section>
    
    
    <div id="fb-root"></div>

@stop

@section('more-scripts')

@stop