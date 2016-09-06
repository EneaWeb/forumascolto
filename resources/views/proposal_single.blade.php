@extends('frontend.layout.main')
@section('content')
    
    @include('frontend.layout.nav_menu')
    
    <script>

        function addlike() {
            
            likes_num = Number($("#likes-number").text());
            
            $.ajax({
                type: "POST",
                url: "/add-like",  
                data: {
                  '_token' : '{!!csrf_token()!!}',
                  'proposal_id' : '{!!$proposal->id!!}'
                },
                success: function(response) {
                  if (response == 'no') {
                      alert('no');
                  } else {
                    $("#likes-number").text(likes_num+1);
                      var div = $('<button id="add-like" onclick="removelike()" class="btn btn-warning voted" ><i class="fa fa-check"></i> Hai votato</button>');
                      $("#add-like").replaceWith(div);
                  }
                },
                error: function(){
                  alert('ajax error');
                } 
            });
        }
              
        function removelike() {
            
            likes_num = Number($("#likes-number").text());
            
              $.ajax({
                  type: "POST",
                  url: "/remove-like",  
                  data: {
                      '_token' : '{!!csrf_token()!!}',
                      'proposal_id' : '{!!$proposal->id!!}'
                  },
                  success: function(response) {
                      if (response == 'no') {
                          alert('no');
                      } else {
                          $("#likes-number").text(likes_num-1);
                          var div = $('<button id="add-like" onclick="addlike()" class="btn btn-main"><i class="fa fa-star-o"></i> Vota Ora</button>');
                          $("#add-like").replaceWith(div);
                      }
                  },
                  error: function(){
                      alert('ajax error');
                  } 
              });
          
        };
    </script>

    <div style="height:120px"></div>
    <section class="" style="min-height:90vh">
        <div class="container">
            
            <!-- SECTION HEADER -->
            <div class="section-header">
                
                <!-- SECTION TITLE -->
                <h2 class="dark-text">{!! isset($title) ? $title : '<i>Pagina non trovata</i>' !!}</h2>
                
                <!-- SHORT DESCRIPTION ABOUT THE SECTION -->
                <div class="col-md-12">
                <br><br>
                    <div style="text-align:left">
                        <br>
                        <div style="color:{!!$proposal->type->hex!!}; float:left; margin-right:4px ">
                            <i class="fa {!!$proposal->type->icon!!} fa-4x" style="margin-left:-10px; margin-top:-6px"></i>
                        </div>
                       <hr>
                        <div class="">
                           <div class="" style="margin-top:-20px">

                           </div>
                           <br>
                           <div class="">
                            <img id="blah" src="/uploads/proposals/{!!$proposal->picture!!}" alt="your image" style="float: left; max-width: 35%; margin-right: 4%; margin-bottom: 2%; border: 1px solid #009fdc;  padding: 10px;"/>
                                <h3 style="text-transform:uppercase">{!!$proposal->title!!}</h3>
                                <a href="/area/{!!$proposal->type->id!!}"># {!!$proposal->type->name!!}</a> &nbsp; 
                                <a href="/tag/{!!$proposal->subtype->id!!}"># {!!$proposal->subtype->name!!}</a>
                                <div class="feedback-box">
                                    <div class="client" style="margin-top:0">
                                        <div class="quote blue-text" style="line-height:60px">
                                            <i class="icon-fontawesome-webfont-294"></i>
                                        </div>
                                        <div class="client-info">
                                            <a class="client-name" href="">{!!$proposal->user->name!!}</a>
                                            <div class="client-company">
                                                {!!$proposal->user->occupation!!}
                                            </div>
                                        </div>
                                        <div class="client-image hidden-xs" style="float:left; margin-left:6px; width:60px; height:60px; margin-top:6px">
                                            @if ($proposal->user->fb_picture != '' && $proposal->user->fb_picture != NULL)
                                               <img src="{!!$proposal->user->fb_picture!!}" alt="{!!$proposal->user->name!!}" style="max-width:55px;">
                                            @else
                                                <img src="/uploads/users/default.png" alt="{!!$proposal->user->name!!}" style="max-width:55px;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <i class="fa fa-star" style="color:#F6DF42; margin-top:-3px"></i>
                                    <little style="color:#969696; font-size:1em"><strong id="likes-number">{!!$proposal->likes!!}</strong> preferenze</little><br>
                                    @if (!Auth::check())
                                        <button type="button" id="add-like" class="btn btn-main launch-modal-login" href="#" data-modal-id="modal-login"><i class="fa fa-star-o"></i> Accedi per votare</button>
                                    @else
                                        @if (\App\Vote::where('user_id', Auth::user()->id)->where('proposal_id', $proposal->id)->first() != NULL)
                                            <button type="button" id="add-like" onclick="removelike()" class="btn btn-warning voted"><i class="fa fa-check"></i> Hai votato</button>
                                        @else
                                            <button type="button" id="add-like" onclick="addlike()" class="btn btn-main"><i class="fa fa-star-o"></i> Vota Ora</button>
                                        @endif
                                    @endif
                                    &nbsp; 
                                    <a id="fb-login-button" onclick="fbShare('{!!Request::url()!!}')" class="btn btn-primary custom-button blue-btn" style="background:#3B5998; width:auto; padding:7px; text-transform:none"><i class="fa fa-facebook" aria-hidden="true"></i> &nbsp;&nbsp;Condividi su Facebook</a>
                                    <br>
                                </div>
                                
                                <br>
                            <p style="font-size:18px; line-height:28px">{!!$proposal->description_short!!}</p>
                            <br><br>
                            <p style="">{!!$proposal->description_long!!}</p>
                            
                            <hr>
                            <br><br>
                                <div class="fb-comments" data-href="{!!Request::url()!!}" data-numposts="10" data-width="100%"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.7&appId=1208756019189278";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                                <br><br>
                           </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <br><br><br>
            <!-- / END SECTION HEADER -->

        </div> <!-- / END CONTAINER -->
    </section>

@stop