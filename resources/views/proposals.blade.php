@extends('frontend.layout.main')
@section('content')
    
    @include('frontend.layout.nav_menu')

    <div style="height:120px"></div>
    <section class="" style="min-height:90vh">
        <div class="container">
            
            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION TITLE -->
                <h2 class="dark-text"># {!!$title!!}</h2>
            </div>
            
                <!-- SHORT DESCRIPTION ABOUT THE SECTION -->
                <div class="col-md-12">
                    
                    <div class="container">
                        @foreach ($proposals as $proposal)
                            <div class="col-md-12"style="text-align:left">
                                <br>
                                <div style="color:{!!$proposal->type->hex!!}; float:left; text-align: right;margin-right:4px; width: 60px;">
                                    <i class="fa {!!$proposal->type->icon!!} fa-4x" style="margin-left:-10px; margin-top:-6px"></i>
                                </div>
                               <hr>
                                <div class="">
                                   <div class="" style="margin-top:-20px">

                                   </div>
                                   <br>
                                   <div class="">
                                        <img id="blah" src="/uploads/proposals/{!!$proposal->picture!!}" alt="your image" style="float: left; width:30%; margin-right: 4%; margin-bottom: 2%; border: 1px solid #009fdc;  padding: 10px;"/>
                                        <h3 style="text-transform:uppercase">{!!$proposal->title!!}</h3>
                                        <a href="/area/{!!$proposal->type->id!!}"># {!!$proposal->type->name!!}</a> &nbsp; 
                                        <a href="/tag/{!!$proposal->subtype->id!!}"># {!!$proposal->subtype->name!!}</a>
                                        <i style="color:#969696">- {!!\Carbon\Carbon::parse($proposal->created_at)->format('d-m-Y')!!}</i>
                                        <br><br>
                                    </a>
                                    <p style="font-size:16px; line-height:26px">{!!$proposal->description_short!!}</p>
                                        <div class="feedback-box">
                                            <div class="client">
                                                <div class="quote blue-text">
                                                    <i class="icon-fontawesome-webfont-294"></i>
                                                </div>
                                                <div class="client-info">
                                                    <a class="client-name" href=""><i>{!!$proposal->user->name!!}</i></a>
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
                        <hr>
                        @endforeach
                    </div>

                    <div style="text-align:right">
                        @if (isset($nolink) && $nolink != true)
                            {{ $proposals->links() }}
                        @endif
                    </div>
                    
                    <br><br><br><br>
                </div>
            
            <!-- / END SECTION HEADER -->

        </div> <!-- / END CONTAINER -->
    </section>
    
    
    <div id="fb-root"></div>

@stop

@section('more-scripts')

@stop