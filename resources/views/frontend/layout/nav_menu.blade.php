<!-- TOP BAR -->
<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header responsive-logo">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <a href="/"><img src="/images/fa.png" alt="a2a" style="max-width:100%"></a>
            </div>
        </div>
        <nav class="navbar-collapse collapse" role="navigation" id="bs-navbar-collapse">
        <ul class="nav navbar-nav navbar-right responsive-nav main-nav-list">
            <li class="current"><a href="/#home">HOME</a></li>
            <li><a href="/#news">NEWS</a></li>
            <li><a href="/#focus">COME FUNZIONA</a></li>
            <li><a href="/#works">PROGETTI</a></li>
            <li><a href="/#faq">FAQ</a></li>
            <li><a href="/#aboutus" style="color:#00a9e6"><div class="a2a-title"></div></a></li>
            <li style="border-right: 1px solid #01A9E6; padding-right: 20px;"><a href="/#contact">Contatti</a></li>
            @if (!Auth::check())
                <li id="menu-is-not-logged"><a class="launch-modal-login" href="#" data-modal-id="modal-login">
                    {{-- <i class="fa fa-sign-in" aria-hidden="true" style="color:#009FDC"></i>--}} Login
                </a></li>
                <li id="menu-is-logged" style="display:none"><a href="/logout">
                    {{--<i class="fa fa-sign-out" aria-hidden="true" style="color:#009FDC"></i>--}} Logout
                </a></li>
            @else
                <li id="menu-is-logged"><a href="/logout">
                    {{-- <i class="fa fa-sign-out" aria-hidden="true" style="color:#009FDC"></i> --}}  Logout
                </a></li>
            @endif
                <li id="menu-is-logged"><a href="#search">
                    <i class="fa fa-search" aria-hidden="true" style="color:#009FDC"></i>
                </a></li>
        </ul>
        </nav>
    </div>
</div>
<!-- / END TOP BAR -->