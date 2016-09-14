@extends('frontend.layout.main')
@section('content')

    @include('frontend.layout.nav_menu')
    
    @include('home-sections.header')

    @include('home-sections.blog')
    
    @include('home-sections.come-funziona')

    @include('home-sections.counter')
    
    @include('home-sections.progetti')
    
    @include('home-sections.testimonial')
    
    @include('home-sections.faq')
    
    @include('home-sections.a2a')

    @include('home-sections.stats')
    
    @include('home-sections.contact-us')

    {{-- @include('components.like-button') --}}

@stop

@section('more-scripts')

<script>

    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
    showLeftPush = document.getElementById( 'showRightPush' ),
    body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toleft' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showRightPush' );
    };

    function disableOther( button ) {
        if( button !== 'showRightPush' ) {
            classie.toggle( showRightPush, 'disabled' );
        }
    }


    $("#js-rotating").Morphext({
        // The [in] animation type. Refer to Animate.css for a list of available animations.
        animation: "flipInX",
        // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
        separator: ",",
        // The delay between the changing of each phrase in milliseconds.
        speed: 2000,
        complete: function () {
            // Called after the entrance animation is executed.
        }
    });
    
    $(document).ready(function () {
       /*====================================
               COUNTDOWN CUSTOM SCRIPTS 
       ======================================*/
        setInterval(function () {
            var enddate = new Date("Nov 15 2016 18:00:00 GMT+02:00"); // change your date here like Jan 10 2016
            var today = new Date();
            var difference = Math.floor((enddate.getTime() - today.getTime()) / 1000);
            var seconds = GlobalFunctn(difference % 60);
            difference = Math.floor(difference / 60);
            var minutes = GlobalFunctn(difference % 60);
            difference = Math.floor(difference / 60);
            var hours = GlobalFunctn(difference % 24);
            difference = Math.floor(difference / 24);
            var days = difference;
            $("#second-number").text(seconds);
            $("#minute-number").text(minutes);
            $("#hour-number").text(hours);
            $("#day-number").text(days);
        }, 1000);

        function GlobalFunctn(valuesmy) {
            if (valuesmy < 0)
                valuesmy = 0;
            if (valuesmy < 10)
                return "0" + valuesmy;
            return "" + valuesmy;
        }
    });
</script>

@stop