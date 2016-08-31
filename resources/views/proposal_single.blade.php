@extends('frontend.layout.main')
@section('content')
    
    @include('frontend.layout.nav_menu')

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
                    <div style="text-align:left">
                        <br>
                        <div style="color:{!!$proposal->type->hex!!}; float:left; margin-right:4px ">
                            <i class="fa {!!$proposal->type->icon!!} fa-4x" style="margin-left:-10px; margin-top:-6px"></i>
                        </div>
                       <hr>
                        <div class="">
                           <div class="" style="margin-top:-20px">

                           </div>
                           <br>
                           <div class="">
                            <img id="blah" src="/uploads/proposals/{!!$proposal->picture!!}" alt="your image" style="float: left; max-width: 35%; margin-right: 4%; margin-bottom: 2%; border: 1px solid #009fdc;  padding: 10px;"/>
                                <h3 style="text-transform:uppercase">{!!$proposal->title!!}</h3>
                                <a href="/area/{!!$proposal->type->id!!}"># {!!$proposal->type->name!!}</a> &nbsp; 
                                <a href="/tag/{!!$proposal->subtype->id!!}"># {!!$proposal->subtype->name!!}</a>
                                <br><br>
                            <p style="font-size:20px; line-height:30px">{!!$proposal->description_short!!}</p>
                                <div class="feedback-box">
                                    <div class="client">
                                        <div class="quote blue-text">
                                            <i class="icon-fontawesome-webfont-294"></i>
                                        </div>
                                        <div class="client-info">
                                            <a class="client-name" href="">{!!$proposal->user->name!!}</a>
                                            <div class="client-company">
                                                {!!$proposal->user->occupation!!}
                                            </div>
                                        </div>
                                        <div class="client-image hidden-xs" style="float:left; margin-left:6px">
                                            @if ($proposal->user->fb_picture != '' && $proposal->user->fb_picture != NULL)
                                               <img src="{!!$proposal->user->fb_picture!!}" alt="{!!$proposal->user->name!!}" style="max-width:67px;">
                                            @else
                                                <img src="/uploads/users/default.png" alt="{!!$proposal->user->name!!}" style="max-width:67px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- / END SECTION HEADER -->

        </div> <!-- / END CONTAINER -->
    </section>
    
    
    <div id="fb-root"></div>

@stop

@section('more-scripts')

@stop