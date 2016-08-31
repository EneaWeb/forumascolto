<!-- SCRIPTS -->
{{ HTML::script('/js/bootstrap.min.js') }}
{{ HTML::script('/js/wow.min.js') }}
{{ HTML::script('/js/jquery.nav.js') }}
{{ HTML::script('/js/jquery.knob.js') }}
{{ HTML::script('/js/owl.carousel.min.js') }}
{{ HTML::script('/js/smoothscroll.js') }}
{{ HTML::script('/js/jquery.vegas.min.js') }}
{{ HTML::script('/js/zerif.js') }}
{{-- <script src="js/jquery.countdown.js"></script> --}}
<script src="js/morphext.js"></script>

<div id="search">
    <button type="button" class="close">×</button>
    {!!Form::open(['url'=>'/search-form', 'method'=>'POST'])!!}
        <input id="xxx" name="search" type="search" value="" placeholder="Cerca per parola/e chiave" />
        <button type="submit" class="btn btn-primary" style="visibility:hidden">Search</button>
    </form>
</div>

<script>
	$(document).ready(function(){

	    $('a[href="#search"]').on('click', function(event) {
	        event.preventDefault();
	        $('#search').addClass('open');
	        $('#search > form > input[type="search"]').focus();
	    });
	    
	    $('#search, #search button.close').on('click keyup', function(event) {
	        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
	            $(this).removeClass('open');
	        }
	    });
	    
	});
</script>

{{-- FACEBOOK LOGIN SCRIPT--}}
@if(!Auth::check())

	<script>
		// summernote.keyup
		$('#summernote').on('summernote.keyup', function(we, e) {
		  console.log('Key is released:', e.keyCode);
		});
		
		function fbLoginButton(){
			FB.login(function(response) {

				if (response.authResponse) {
					console.log('Verifico la connessione con Facebook.');
					//console.log(response); // dump complete info
					access_token = response.authResponse.accessToken; //get access token
					user_id = response.authResponse.userID; //get FB UID
					connectToFB();
					
					} else {
					//user hit cancel button
					console.log("L'utente ha deciso di non autorizzare la connessione.");
					}
				}, {
					scope: 'email'
				});
		}
		(function() {
		    var e = document.createElement('script');
		    e.src = document.location.protocol + '//connect.facebook.net/it_IT/all.js';
		    e.async = true;
		    document.getElementById('fb-root').appendChild(e);
		}());
		
	  // This is called with the results from from FB.getLoginStatus().
	  function statusChangeCallback(response) {
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      //connectToFB();
	      //$("#facebook-connect-button").hide();
	    }
	    if (response.status === 'not_authorized') {
	    	console.log('connessione fb non autorizzata -> accedere/registrarsi manualmente');
	    }
	  }

	  // This function is called when someone finishes with the Login
	  // Button.  See the onlogin handler attached to it in the sample
	  // code below.
	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	  	window.fbAsyncInit = function() {
			FB.init({
				appId      : '1208756019189278',
				cookie     : true,  // enable cookies to allow the server to access 
				                  // the session
				xfbml      : true,  // parse social plugins on this page
				version    : 'v2.5' // use graph api version 2.5
			});

				// Now that we've initialized the JavaScript SDK, we call 
				// FB.getLoginStatus().  This function gets the state of the
				// person visiting this page and can return one of three states to
				// the callback you provide.  They can be:
				//
				// 1. Logged into your app ('connected')
				// 2. Logged into Facebook, but not your app ('not_authorized')
				// 3. Not logged into Facebook and can't tell if they are logged into
				//    your app or not.
				//
				// These three cases are handled in the callback function.

			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
	  	};

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/it_IT/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));

	  // connect to fb 
		function connectToFB() {
			FB.api('/me?fields=first_name,last_name,link,website,work,interested_in,about,email,picture.type(large),birthday,bio', function(response) {
				// logged succesfully
				$.ajax({
				   url: '/facebook-login',
				   type: 'POST',
				   data: {
				      _token : '{!!csrf_token()!!}',
				      response
				   },
				   error: function() {
						;
				   },
				   success: function(data) {
				      if (data === 'ok') {
				      	window.location.replace("/");
				      	// se sul menu è ancora presente il pulsante di login
				      	if ($('#menu-is-not-logged').length) {
				      		// nascondo il pulsante di login
				      		$('#menu-is-not-logged').hide();
				      		// mostro il pulsante di logout
				      		$('#menu-is-logged').show();
				      	}
				      }
				   }
				});
			});
		};

	</script>
	{{-- END FACEBOOK LOGIN SCRIPT--}}

@endif

@yield('more-scripts')
@yield('more-scripts2')
@yield('more-scripts3')