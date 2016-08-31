<!-- MODAL -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
    <div class="modal-dialog"  style="width:400px">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Accedi / Registrati</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12">
                      <div class="well">
                          <form id="loginForm" method="POST" action="/login/" novalidate="novalidate" autocomplete="off">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="login-username" name="username" value="" required="" title="Indirizzo email" placeholder="Il tuo indirizzo Email" autocomplete="off">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <input type="password" class="form-control" id="login-password" name="password" value="" required="" title="Password" placeholder="La tua password" autocomplete="off">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error" style="display:none">Dati di accesso errati.</div>
                              {{--
                              <div class="checkbox" style="text-align:left">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                              </div>
                              --}}
                              <button type="submit" class="btn btn-primary custom-button red-btn" id="login-submit-button" style="border:3px solid #01A9E6; background-color:inherit; color:#01A9E6">Accedi</button>
                              <br>
                              {{--
                                Below we include the Login Button social plugin. This button uses
                                the JavaScript SDK to present a graphical Login button that triggers
                                the FB.login() function when clicked.
                              
                              <div id="facebook-connect-button">
                                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                                </fb:login-button>
                              </div>
                              --}}
                              
                              <a id="fb-login-button" onclick="fbLoginButton()" class="btn btn-primary custom-button blue-btn" style="background:#3B5998">
                              <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp;&nbsp;Collegati con Facebook</a>
                              
                              <div id="status">
                                <hr>
                              </div>
                              
                              <div class="col-md-12" style="padding:0">
                                <span class="" style="float:left;  margin-top:10px">Non hai un account? </span>
                                <a href="/forgot/" id="registration-button" class="btn btn-primary custom-button green-btn" style="color:#01A9E6; background-color:inherit; border:2px solid #01A9E6; padding:6px 12px; width:auto;float:right; font-weight:normal; text-transform:none; ">Registrati</a>
                                <br>
                              </div>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
#login-submit-button,
#registration-button,
#fb-login-button {
    margin:6px 0px;
    width:100%;
    padding:10px;
}
#loginErrorMsg {
    color: #CA0000;
    padding:0;
}
.modal-header {
    border-bottom:4px solid #00B0EB;
}
.well {
    background-color:inherit;
}
</style>
        
<script>


$('.launch-modal-login').on('click', function(e){
    
    user = $('#login-username');
    pass = $('#login-password');
    error = $('#loginErrorMsg');

    e.preventDefault();
    error.hide();
    user.val('');
    pass.val('');
    $( '#' + $(this).data('modal-id') ).modal();
});

$(document).ready(function(){
    
    user = $('#login-username');
    pass = $('#login-password');
    error = $('#loginErrorMsg');
    
    user.click(function(){ if (error.is(':visible')) { error.fadeToggle("slow"); }; })
    pass.click(function(){ if (error.is(':visible')) { error.fadeToggle("slow"); }; })
    
    $( "#loginForm" ).submit(function( event ) {
        event.preventDefault();
        userval = user.val();
        passval = pass.val();
        $.ajax({  
            type: "POST",
            url: "/login",  
            data: {
                '_token' : '{!!csrf_token()!!}',
                'user' : userval,
                'pass' : passval
            },
            dataType: "html",
            success: function(response) {
                if (response == 'error') {
                    $('#loginErrorMsg').hide().fadeToggle("slow");
                } else {
                  window.location.href = '/login-success';
                }
            },
            error: function(){

            } 
        }); 
        return false;  
    });

});





</script>