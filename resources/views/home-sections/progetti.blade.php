<section class="works" id="works">

<!-- SECTION HEADER -->
<div class="section-header">

    <!-- SECTION TITLE -->
    <h2 class="dark-text">I PROGETTI PIÙ VOTATI</h2>
    
    <!-- SHORT DESCRIPTION ABOUT THE SECTION -->
    <h6>
        Questi sono i progetti che hanno ricevuto il maggior numero di like e che piacciono di più ai cittadini di Milano. <a href="/progetti"><u>Vota anche tu</u></a>.
    </h6>
</div>
<div style="height:30px;">&nbsp;</div>
<div class="container">

    <!-- / END SECTION HEADER -->
    <div class="row projects">
    <div id="loader">
        <div class="loader-icon"></div>
    </div>
    <div class="col-md-12" id="portfolio-list">
        <!-- PORTFOLIO ITEMS-->
        <ul class="cbp-rfgrid">
        
        @foreach($best_proposals as $proposal)
            <!-- PROJECT -->   
            <li class="wow fadeInLeft animated padd2" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s" style="border: 1px solid #E5E5E5">
                <a href="/proposta-preview/{!!$proposal->id!!}" class="more">
                    <div style="background-image:url('/uploads/proposals/{!!$proposal->picture!!}'); background-position:center; background-size:cover; width:100%;height:200px"  alt="project"/>
                    <div class="project-icon-2" style="color:{!!$proposal->type->hex!!}">
                        <i class="fa {!!$proposal->type->icon!!} fa-4x"></i>
                    </div>
                    <div class="project-info">
                        <div class="project-details">
                            <div class="details white-text">
                                <br>
                                <i>{!!$proposal->type->name!!}</i>
                            </div>
                            <h5 class="white-text red-border-bottom">
                            {!!$proposal->title!!} </h5>
                            <div class="details white-text">
                                {!!$proposal->user->name!!}
                            </div>
                            <i class="fa fa-star" style="color:#F6DF42; margin-top:-3px"></i>
                            <little style="color:#CECECE; font-size:0.7em">{!!$proposal->likes!!} preferenze</little>
                        </div>
                    </div>
                </a>
            </li>
            <!-- / PROJECT -->
        @endforeach

        <!-- ... -->
        </ul>
    </div>
    <!-- END OF PORTFOLIO ITEMS-->

    
</div>
    
    <!-- PROJECT DETAILS WILL BE LOADED HERE -->
    
    <div id="loaded-content"></div>
    <a id="back-button" class="red-btn" href="#" style="float:right"><i class="icon-fontawesome-webfont-27"></i> Indietro</a>
    
</div> <!-- / END CONTAINER -->
</section>