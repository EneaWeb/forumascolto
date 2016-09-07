<!-- MODAL -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
   <div class="modal-dialog"  style="width:400px">
      <div class="modal-content" id="card">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Accedi / Registrati</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xs-12">
               <div class="well">
                     {!!Form::open(['method'=>'POST', 'url'=>'/login', 'novalidate'=>'novalidate', 'autocomplete'=>'off', 'id'=>'loginForm'])!!}
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
                           <button id="pass-to-register" type="button" class="btn btn-primary custom-button green-btn" data-toggle="modal" data-target="#register-modal" data-dismiss="modal" style="color:#01A9E6; background-color:inherit; border:2px solid #01A9E6; padding:6px 12px; width:auto;float:right; font-weight:normal; text-transform:none; ">Registrati</button>
                           <br>
                        </div>
                        <div class="clearfix"></div>
                     {!!Form::close()!!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
   <div class="modal-dialog"  style="width:400px">
      <div class="modal-content" id="card">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Registrazione</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-xs-12">
               <div class="well">      

                     {!!Form::open(['method'=>'POST', 'url'=>'/registration', 'novalidate'=>'novalidate', 'autocomplete'=>'off'])!!}
                        <div class="form-group">
                           {!!Form::text('name', '', ['placeholder'=>'Nome', 'id'=>'', 'class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                           {!!Form::text('surname', '', ['placeholder'=>'Cognome', 'id'=>'', 'class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                           {!!Form::text('occupation', '', ['placeholder'=>'Occupazione', 'id'=>'', 'class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                           {!!Form::email('email', '', ['placeholder'=>'Email', 'id'=>'', 'class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                           {!!Form::text('pass1', '', ['placeholder'=>'Password', 'id'=>'', 'class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                           {!!Form::text('pass2', '', ['placeholder'=>'Conferma Password', 'id'=>'', 'class'=>'form-control'])!!}
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <select name="gender" id="form-gender" class="form-control">
                                 <option disabled selected>Sesso</option>
                                 <option value="F">F</option>
                                 <option value="M">M</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              {!!Form::text('cap', '', ['placeholder'=>'CAP', 'id'=>'', 'class'=>'form-control'])!!}
                           </div>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" value=""> <i>Registrandoti o accedendo con facebook accetti i <a href="/regolamento">termini e le condizioni</a></i>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <button type="button" class="btn btn-primary custom-button red-btn" data-toggle="modal" data-target="#modal-login" data-dismiss="modal" style="border:3px solid #01A9E6; background-color:inherit; color:#01A9E6; padding:10px; width:100%; margin:6px 0px;">Accedi</button>
                           </div>
                           <div class="col-md-6">
                              <button type="submit" class="btn btn-primary custom-button red-btn" id="login-submit-button" style="width:100%; border:3px solid #01A9E6; color:#FFFFFF">Registrati</button>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     {!!Form::close()!!}

                     <a id="fb-login-button2" onclick="fbLoginButton()" class="btn btn-primary custom-button blue-btn" style="background:#3B5998; width:100%; margin:0">
                     <i class="fa fa-facebook" aria-hidden="true"></i> &nbsp;&nbsp;Collegati con Facebook</a>   
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