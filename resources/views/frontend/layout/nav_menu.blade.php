<div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip jq-dropdown-anchor-right">
    <ul class="jq-dropdown-menu">
        <li><a href="/logout">
            SCOLLEGATI <br>
        </a></li>
    </ul>
</div>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
    <h3>Menu</h3>
    @if (!Auth::check())
        <a class="launch-modal-login" href="#" data-modal-id="modal-login">Accedi/Registrati</a>
    @else
        <a href="/logout">Logout</a>
    @endif
    <a href="/#home">HOME</a>
    <a href="/#news">NEWS</a>
    <a href="/#focus">COME FUNZIONA</a>
    <a href="/#works">PROGETTI</a>
    <a href="/#faq">FAQ</a>
    <a href="/#contact">CONTATTI</a>
</nav>

<!-- TOP BAR -->
<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header responsive-logo">
            <button class="navbar-toggle collapsed" type="button" id="showRightPush">
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
            <li><a href="/#focus" style="color:#00AEEF">COME FUNZIONA</a></li>
            <li><a href="/#works">PROGETTI</a></li>
            <li><a href="/#faq">FAQ</a></li>
            <li><a href="/#aboutus" style="color:#00a9e6"><div class="a2a-title"></div></a></li>
            <li style="border-right: 1px solid #01A9E6; padding-right: 20px;"><a href="/#contact">Contatti</a></li>
            <li id="menu-is-logged">
                <a href="#search"><i class="fa fa-search" aria-hidden="true" style="color:#009FDC"></i></a>
            </li>
            @if (!Auth::check())
                <li id="menu-is-not-logged"><a class="launch-modal-login" href="#" data-modal-id="modal-login">Login</a></li>                
                <li id="menu-is-logged" style="display:none"><a href="/logout">
                Logout</a></li>
            @else
                <li id="menu-is-logged">
                    <a href="#" data-jq-dropdown="#jq-dropdown-1">
                        @if (Auth::user()->fb_picture == '')
                        <img src="/uploads/users/default.png" style="max-width:30px; opacity:0.6" />
                        @else
                        <img src="{!!Auth::user()->fb_picture!!}" style="max-width:36px; border-radius:20px;" />
                        @endif
                    </a>
                </li>
            @endif
        </ul>
        </nav>
    </div>
</div>
<!-- / END TOP BAR -->

<style>
#menu-is-logged:hover:before, #menu-is-logged.current:before {
    background:inherit;
}
</style>