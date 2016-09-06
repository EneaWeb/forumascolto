<section class="testimonial" id="testimonials">
<div class="container">
    <!-- / END SECTION HEADER -->
        <!-- CLIENT FEEDBACKS -->
    <div class="row wow fadeInRight animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
    
        <div class="col-md-12">
            <hr>
            
            <div id="client-feedbacks" class="owl-carousel owl-theme">

                @foreach($best_proposals as $proposal)
                
                    <div class="feedback-box">
                    
                        <div class="project-icon" style="color:{!!$proposal->type->hex!!};">
                            <i class="fa {!!$proposal->type->icon!!} fa-4x"></i>
                        </div>
                            
                        <div class="message">
                            <h4 style="margin-bottom:20px; color:black; ">

                                <a href="/progetto/{!!$proposal->id!!}">{!!$proposal->title!!}</a>
                                <br>
                                <i class="fa fa-star" style="color:#F6DF42; margin-top:-3px"></i>
                                <little style="color:#969696; font-size:0.7em">{!!$proposal->likes!!} preferenze</little>
                            </h4>
                            {!!substr(strip_tags($proposal->description_short, '<br>'), 0, 300)!!}...
                            <a href="/proposta/{!!$proposal->id!!}"> Leggi tutto</a>
                        </div>
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
                            <div class="client-image hidden-xs">
                                @if ($proposal->user->fb_picture != '' && $proposal->user->fb_picture != NULL)
                                    <img src="{!!$proposal->user->fb_picture!!}" alt="{!!$proposal->user->name!!}" style="max-width:67px">
                                @else
                                    <img src="/uploads/users/default.png" alt="{!!$proposal->user->name!!}" style="max-width:67px;">
                                @endif
                            </div>
                        </div>
                    </div>
                
                @endforeach
                
            </div> <!-- / END FEEDBACKS-->
    
        </div> <!-- / END COLUMN -->
    </div> <!-- / END ROW -->
    
</div> <!-- / END CONTAINER -->

<br><br>
<a href="/proposte" class="btn btn-primary custom-button red-btn wow fadeInLeft animated animated animated" style="visibility: visible;">TUTTE LE PROPOSTE</a>

</section>