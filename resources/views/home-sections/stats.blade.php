
<!-- =========================
   STATS              
============================== -->

<section class="stats">
    <div class="container">
        <!-- STATS -->
        <div class="row">
            
            <!-- START COLUMN -->
            <div class="col-lg-3 col-sm-3">
                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                    <div class="icon-top red-text">
                        <i class="icon-design-graphic-tablet-streamline-tablet"></i>
                    </div>
                    <div class="stat-text">
                    <h3 class="white-text red-border-bottom">{!!\App\Proposal::count()!!}</h3>
                    <h6>Progetti caricati</h6>
                    </div>
                </div>
            </div> <!-- / END COLUMN -->
            
            <!-- START COLUMN -->
            <div class="col-lg-3 col-sm-3">
                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.75s" data-wow-delay="0.30s">
                    <div class="icon-top green-text">
                        <i class="icon-man-people-streamline-user"></i>
                    </div>
                    <div class="stat-text">
                    <h3 class="white-text green-border-bottom">{!!\App\User::count()!!}</h3>
                    <h6>Utenti iscritti</h6>
                    </div>
                </div>
            </div> <!-- / END COLUMN -->
            
            <!-- START COLUMN -->
            <div class="col-lg-3 col-sm-3">
                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="2s" data-wow-delay="0.45s">
                    <div class="icon-top blue-text">
                        <i class="icon-sharethis"></i>
                    </div>
                    <div class="stat-text">
                    <h3 class="white-text blue-border-bottom">0</h3>
                    <h6>Condivisioni</h6>
                    </div>
                </div>
            </div> <!-- / END COLUMN -->
            
            <!-- START COLUMN -->
            <div class="col-lg-3 col-sm-3">
                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="2.25s" data-wow-delay="1s">
                    <div class="icon-top yellow-text">
                        <i class="icon-fontawesome-webfont-20"></i>
                    </div>
                    <div class="stat-text">
                    <h3 class="white-text yellow-border-bottom">{!!\App\Proposal::sum('likes')!!}</h3>
                    <h6>Voti</h6>
                    </div>
                </div>
            </div> <!-- / END COLUMN -->
        </div>
</div>
</section>  <!-- / END STATS -->