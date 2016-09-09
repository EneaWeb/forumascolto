{{-- START X-NAVIGATION HORIZONTAL --}}
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">

    {{-- TOGGLE NAVIGATION --}}
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize" id="minimize_maximize"><span class="fa fa-dedent"></span></a>
    </li>
    <script>$('#minimize_maximize').click(function() { $.ajax({ url: "/minimize-maximize", method:"POST", data: { '_token': '{!!csrf_token()!!}', } }); }); </script>
    {{-- END TOGGLE NAVIGATION --}}    
    
    {{-- PAGE TITLE --}}
    <li style="padding-top:6px; font-size:2em; color:#CDCDCD">
        {!! (isset($page_title))? $page_title : ''!!}
    </li>
    {{-- END PAGE TITLE --}}
             
    {{-- POWER OFF --}}
    <li class="xn-icon-button pull-right last">
        <a href="#"><span class="fa fa-power-off"></span></a>
        <ul class="xn-drop-left animated zoomIn">
            {{-- <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li> --}}
            <li><a href="/logout"><span class="fa fa-sign-out"></span> Scollegati </a></li>
        </ul>                        
    </li> 
    {{-- END POWER OFF --}}
</ul>
{{-- END X-NAVIGATION HORIZONTAL --}}