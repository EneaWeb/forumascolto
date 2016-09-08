<!-- =========================
   CONTACT US         
============================== -->

<section class="contact-us" id="contact">
<div class="container">
    
    <!-- SECTION HEADER -->
      <div class="section-header">
        
        <!-- SECTION TITLE -->
        <h2 class="">CONTATTI</h2>
        
    <!-- / END SUBSCRIPTION FORM -->
    </div>
    <!-- CONTACT FORM-->
    <div class="row">
        {{--
        <div class="col-md-2">
            <div class="row" style="margin-bottom:20px">
                <div class="col-xs-9">
                </div>
                <div class="col-xs-3">
                    <i class="icon-facebook-alt" style="font-size:40px"></i>
                </div>
            </div>
            <div class="row" style="margin-bottom:20px">
                <div class="col-xs-9">
                </div>
                <div class="col-xs-3">
                    <i class="icon-twitter-alt" style="font-size:40px"></i>
                </div>
            </div>
            <div class="row" style="margin-bottom:20px">
                <div class="col-xs-9">
                </div>
                <div class="col-xs-3">
                    <i class="icon-fontawesome-webfont-2" style="font-size:40px"></i>
                </div>
            </div>
            <div class="row" style="margin-bottom:20px">
                <div class="col-xs-9">
                </div>
                <div class="col-xs-3">
                    <i class="icon-google" style="font-size:40px"></i>
                </div>
            </div>
        </div>
        --}}
        <div class="col-md-12">
        
            {!!Form::open(['url'=>'/contact-form/send', 'method'=>'POST', 'class'=>'contact-form'])!!}
            
                <div class="wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                    <div class="col-lg-6 col-sm-6">
                        {!!Form::input('text', 'name', '', ['class'=>'form-control input-box', 'id'=>'name', 'placeholder'=>'Nome'])!!}
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        {!!Form::input('email', 'email', '', ['class'=>'form-control input-box', 'id'=>'email', 'placeholder'=>'Email'])!!}
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        {!!Form::select('subject', \App\ContactType::pluck('name', 'name'), '', ['class'=>'form-control input-box', 'placeholder'=>'Seleziona il motivo del contatto'])!!}
                    </div>
                </div>
                
                <div class="col-md-12 wow fadeInRight animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                    {!!Form::textarea('message', '', ['class'=>'form-control textarea-box', 'placeholder'=>'Scrivi qui il tuo messaggio ...', 'id'=>'message'])!!}
                </div>
                
                {!!Form::submit('Invia il messaggio', ['class'=>'btn btn-primary custom-button red-btn wow fadeInLeft animated'])!!}
            
            {!!Form::close()!!}
            
        </div>
        
    </div>
    <!-- / END CONTACT FORM-->
</div> <!-- / END CONTAINER -->
</section> <!-- / END CONTACT US SECTION-->