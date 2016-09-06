<style>
input:disabled {
	background-color:#E5E5E5!important;
}

.form-badge {
	
	position:absolute;
	
	border-radius: 50%;
	behavior: url(PIE.htc); /* remove if you don't care about IE8 */

	width: 60px;
	height: 60px;
	font-size:30px;
	padding: 16px;

	position: absolute;
	top: 0;
	right: 0;
	margin-right:-20px;
	margin-top:-20px;
	background-color: #00aae7;
	color:white;
	text-align: center;
}
/* select with custom icons */
.ui-selectmenu-menu .ui-menu.customicons .ui-menu-item-wrapper {
padding: 0.5em 0 0.5em 3em;
}
.ui-selectmenu-menu .ui-menu.customicons .ui-menu-item .ui-icon {
height: 24px;
width: 24px;
top: 0.1em;
}
.ui-icon.video {
background: url("images/24-video-square.png") 0 0 no-repeat;
}
.ui-icon.podcast {
background: url("images/24-podcast-square.png") 0 0 no-repeat;
}
.ui-icon.rss {
background: url("images/24-rss-square.png") 0 0 no-repeat;
}

/* select with CSS avatar icons */
option.avatar {
background-repeat: no-repeat !important;
padding-left: 20px;
}
.avatar .ui-icon {
background-position: left top;
}

#msform select.mw300 {
	padding: 0px 10px;
	height:60px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	color: #2C3E50;
	margin-left:4px;
	font-size: 13px;
}

.mw300 {
	max-width:300px;
	margin-left:auto;
	margin-right:auto;
	max-height:40px;
}

#msform .bootstrap-tagsinput > input {
	border:none;
	padding:0;
	border-radius:none;
	margin:0;
	width:auto;
}

#msform input[type=radio] {
	padding: 0px;
   border: none!important;
   border-radius: 0;
   margin-bottom: 0;
   width: auto;
   color: inherit;
}

#msform input[type=radio]{
  position: absolute;
  visibility: hidden;
}

#msform #subtypes label {
	background-color: #f6f6f6;
   padding: 4px;
   margin: 4px;
   color: #818181;
   cursor:pointer;
}

#msform #subtypes label:hover {
	background-color: #00AAE7;
   color: #FAFAFA;
}

#msform #subtypes input[type=radio]:checked + label{
  color: #FAFAFA;
	background-color: #00AAE7;
}

input[type=checkbox]:hover, input[type=checkbox]:focus {
	display:inherit;
	-webkit-appearance: default;
	left:0;
	width: auto;
	margin-right:4px;
}

.previous.action-button {
	float:left;
}

.next.action-button, #save_all {
	float:right;
    padding: 10px 5px;
    margin: 10px 5px;
}

</style>


<!-- MODAL -->
<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
	<div class="modal-dialog"  style="width:100%; max-width:600px">

			{!!Form::open(['url'=>'/form-upload', 'method'=>'POST', 'files'=>true, 'id'=>'msform', 'class'=>'dropzone'])!!}
				<!-- fieldsets -->
				<fieldset>
					<span class="form-badge">1</span>
					<h3 class="fs-title">
						Seleziona <br>l'<span class="colored-blue">area</span> di riferimento.
					</h3>
					<h3 class="fs-subtitle">
					
					</h3>
					<br>
					<select name="type" class="mw300" id="type-select">
						<option value="" selected="selected" disabled>Seleziona un'area</option>
						@foreach(\App\Type::all() as $type)
							<option value="{!!$type->id!!}"> {!!strtoupper($type->name)!!}</option>
						@endforeach
					</select>
					<br><br>
						<div id="subtypes" style="height:60px; margin-top:-10px; margin-bottom:36px">
							<h3 class="fs-title" style="opacity:0.1">Seleziona <br>un<span class="colored-blue"> hashtag</span> di riferimento.</h3>
							<input name ="subtype" type="radio">
						</div>
					<br><br>
					<input type="button" name="next" id="next-1" class="next action-button" value="Avanti" disabled />
				</fieldset>				
				<fieldset>
					<span class="form-badge">2</span>
					<h3 class="fs-title">
						Inserisci un <span class="colored-blue">titolo</span> <br>
						e una breve <span class="colored-blue">descrizione</span> <br>
						per il tuo progetto
					</h3>
					<h3 class="fs-subtitle">
						<span id="error-title" style="color:#D10000; display:none;">
							errors
						</span>
					</h3>
					
					{!!Form::text('title', '', ['placeholder'=>'Titolo del progetto', 'id'=>'form-title'])!!}
					{!!Form::textarea('description_short', '', ['placeholder'=>'Descrizione Breve (max. 130 caratteri)', 'style'=>'resize: none; max-height:200px', 'id'=>'form-description_short', 'class'=>'summernote'])!!}
					<input type="button" name="previous" class="previous action-button" value="Indietro" />
					<input type="button" id="next-2" name="next" class="next action-button" value="Avanti" disabled/>
				</fieldset>
				<fieldset>
					<span class="form-badge">3</span>
					<h3 class="fs-title">
						Inserisci una <span class="colored-blue">descrizione estesa</span>
					</h3>
					<h3 class="fs-subtitle">
					
					</h3>
					{!!Form::textarea('description_long', '', ['placeholder'=>'Descrizione Completa (max. 3000 Caratteri)', 'style'=>'resize: none', 'id'=>'form-description_long', 'class'=>'summernote'])!!}
					<input type="button" name="previous" class="previous action-button" value="Indietro" />
					<input type="button" name="next" id="next-3" class="next action-button" value="Avanti" disabled />
				</fieldset>
				<fieldset>
					<span class="form-badge">4</span>
					<h3 class="fs-title">
						Inserisci una <span class="colored-blue">immagine</span>
					</h3>
					<h3 class="fs-subtitle">
						Formati di file accettati: JPG, PNG, GIF.
						<span style="color:#D40000; display:none;" id="error-picture" >
							<br>Formato file non valido.<br>
						</span>
					</h3>
					{!!Form::file('picture', ['id'=>'imgInp'])!!}
					<input type="button" name="previous" class="previous action-button" value="Indietro" />
					<input type="button" name="next" id="next-4" class="next action-button" value="Avanti" disabled />
				</fieldset>
				<fieldset>
					<span class="form-badge">5</span>
					<h3 class="fs-title">
						
					</h3>
					<h3 class="fs-subtitle">
					
					</h3>
						<div class="row">
								
							<div class="col-md-12">
								<img id="blah" src="#" alt="your image" style="float: left; max-width: 45%; margin-right: 4%; margin-bottom: 2%;"/>
								<h3 id="preview-title" class="fs-title" style="text-align:left"></h3>
								<h3 id="preview-description_short" style="text-align:left" class="fs-subtitle"></h3>
							</div>
						<br><br>
						</div>
						<div class="row">
						<br>
							<div class="col-md-12" style="max-height:400px; overflow:auto;">
								<p id="preview-description_long" style="text-align:left"></p>
							</div>
						<br><br>
						</div>
					<input type="button" name="previous" class="previous action-button" value="Indietro" />
					@if (Auth::check())
						<a class="btn red-btn" id="save_all" style="color:white;padding:12px;border-radius:0;font-weight:bold;">
							Conferma e Invia
						</a>
					@else
						<input type="button" name="next" id="last-confirm" class="next action-button" value="Conferma" />
					@endif
				</fieldset>
				{{-- Se l'utente non è registrato, gli viene chiesto di compilare ulteriori campi per la registrazione --}}
				@if (!Auth::check())
					<fieldset>
						<span class="form-badge">R</span>
						<h3 class="fs-title">
							<span class="colored-blue">Registrazione</span>
						</h3>
						<h3 class="fs-subtitle">
							Grazie per avere compilato la tua proposta! Per completare la pubblicazione della proposta, è necessario essere registrati.
						</h3>
						{!!Form::text('name', '', ['placeholder'=>'Nome', 'id'=>'form-name', 'class'=>'mw300'])!!}
						{!!Form::text('surname', '', ['placeholder'=>'Cognome', 'id'=>'form-surname', 'class'=>'mw300'])!!}
						{!!Form::text('occupation', '', ['placeholder'=>'Occupazione', 'id'=>'form-surname', 'class'=>'mw300'])!!}
						{!!Form::email('email', '', ['placeholder'=>'Email', 'id'=>'form-email', 'class'=>'mw300'])!!}
						{!!Form::text('pass1', '', ['placeholder'=>'Password', 'id'=>'form-pass1', 'class'=>'mw300'])!!}
						{!!Form::text('pass2', '', ['placeholder'=>'Conferma Password', 'id'=>'form-pass2', 'class'=>'mw300'])!!}
    <div class="mw300">
      <input type="checkbox" value="">Dichiaro di aver letto e accettato tutti i termini del <a href="" target="_blank">regolamento</a> e l'<a href="" target="_blank">informativa sulla privacy</a>
    </div>
						
						<select name="gender" id="form-gender" class="mw300">
							<option disabled selected>Sesso</option>
							<option value="F">F</option>
							<option value="M">M</option>
						</select>
						<br>
						<br>
						<a class="btn red-btn" id="save_all" style="color:white;padding:12px;border-radius:0;font-weight:bold;">
							Conferma e Invia
						</a>
						<br>
					</fieldset>
				@endif
			{!!Form::close()!!}

			<script>
				{{--
				$('#form-tags').tagsinput({
				  maxTags: 20,
				  confirmKeys: [13, 44, 8, 186]
				});
				--}}
				
				function readURL(input) {
					
				  if (input.files && input.files[0]) {
				  	
				      var reader = new FileReader();
				      filetype = input.files[0].type;
				      
				      reader.onload = function (e) {
				      	if ( filetype != 'image/png' && filetype != 'image/jpeg' && filetype != 'image/gif' ) {
				      		$('#error-picture').hide().fadeToggle("slow");
				      	} else {
				      		$('#error-picture').hide();
								$('#blah').attr('src', e.target.result);
				         	$('#next-4').removeAttr("disabled");
				      	}
				      }
				      reader.readAsDataURL(input.files[0]);
				  }
				};

				$("div.dropzone-previews").dropzone({ url: "/file/post" });

				$(document).ready(function(){
					
					$("#save_all").click(function() {
					   $('#msform').submit();
					});
										
					$('#type-select').change(function(){
						type_id = $('#type-select').val();
						$.ajax({
						  method: "POST",
						  url: "/get-subtypes",
						  data: { 
								_token: '{!!csrf_token()!!}', 
								type_id: type_id 
							}
						})
						.done(function( msg ) {
							$('#subtypes').html(msg).fadeIn(800);
						})
						.error(function( msg ) {
						   alert('ajax error');
						})
					});
				
					$("#subtypes").click(function(){
						if ($('#type-select').val().length >= 1) {
							$('#next-1').removeAttr("disabled");
						}
					});
					
					$("#imgInp").change(function(){
					  readURL(this);
					});
					
					$("#form-title").keyup(function() {
						titleCount = $("#form-title").val().length;
						descShortCount = $("#form-description_short").val().length;
						next2Button = $("#next-2");
					  	if (titleCount >= 6 && descShortCount >= 10) {
					  		next2Button.removeAttr("disabled");
					  	};
					  	if (titleCount < 6 && descShortCount < 10) {
					  		next2Button.attr("disabled", "");
					  	};
					  	// populate preview
					  	$('#preview-title').html($("#form-title" ).val());
					});
					
					$(document).ready(function() {
					  $('.note-fontname').remove();
					  $('.note-style').remove();
					  $('.note-para').remove();
					  $('.note-insert').remove();
					  $('.note-color').remove();
					  $('.note-table').remove();		  
					  $('.note-view').remove();		  
					});
					
					$('#form-description_short').summernote({
				  		align: 'justifyLeft', 
				  		lang: 'it-IT',
				  		height: '160px',
					  	callbacks: {
					    	onKeyup: function(e) {
								titleCount = $("#form-title").val().length;
								descShortCount = (e.currentTarget.innerText).length;
								next2Button = $("#next-2");
								
							  	if (titleCount >= 6 && descShortCount >= 10) {
							  		next2Button.removeAttr("disabled");
							  	};
							  	if (titleCount < 6 && descShortCount < 10) {
							  		next2Button.attr("disabled", "");
							  	};
							  	
							  	$('#preview-description_short').html(e.currentTarget.innerHTML);
							  	
				    		}
				  		}
					});

					$('#form-description_long').summernote({
				  		align: 'justifyLeft', 
				  		lang: 'it-IT',
				  		height: '160px',
					  	callbacks: {
					    	onKeyup: function(e) {
								descLongCount = (e.currentTarget.innerText).length;
								next3Button = $("#next-3");
							  	if (descLongCount >= 6) {
							  		next3Button.removeAttr("disabled");
							  	};
							  	if (descLongCount < 6) {
							  		next3Button.attr("disabled", "");
							  	};
							  $('#preview-description_long').html(e.currentTarget.innerHTML);
							  	
				    		}
				  		}
					});


					//////////////// LOGIN PART ///////////////////////
					function validateEmail(email) {
					    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					    return re.test(email);
					}

					$("#form-name" ).keyup(function() {
						surnameLongCount = $("#form-surname").val().length;
						emailVal = $("#form-email").val();
						emailLongCount = $("#form-email").val().length;
						saveButton = $("#save_all");
						if ($(this).val().length > 1 && surnameLongCount > 1 && emailLongCount > 1 && validateEmail(emailVal)) {
							saveButton.removeAttr("disabled");
						} else {
							saveButton.attr("disabled", "");
						}
					});
					
					$("#form-surname" ).keyup(function() {
						nameLongCount = $("#form-name").val().length;
						emailVal = $("#form-email").val();
						emailLongCount = $("#form-email").val().length;
						saveButton = $("#save_all");
						if ($(this).val().length > 1 && nameLongCount > 1 && emailLongCount > 1 && validateEmail(emailVal)) {
							saveButton.removeAttr("disabled");
						} else {
							saveButton.attr("disabled", "");
						}
					});
					
					$("#form-email" ).keyup(function() {
						nameLongCount = $("#form-name").val().length;
						emailVal = $("#form-email").val();
						surnameLongCount = $("#form-surname").val().length;
						saveButton = $("#save_all");
						if ($(this).val().length > 1 && nameLongCount > 1 && surnameLongCount > 1 && validateEmail(emailVal)) {
							saveButton.removeAttr("disabled");
						} else {
							saveButton.attr("disabled", "");
						}
					});
					
					/*
					$(".submit").click(function(){
						return false;
					});
					*/

					$('.launch-modal-upload').on('click', function(e){
						e.preventDefault();
						$( '#' + $(this).data('modal-id') ).modal();
					});
					
					//jQuery time
					var current_fs, next_fs, previous_fs; //fieldsets
					var left, opacity, scale; //fieldset properties which we will animate
					var animating; //flag to prevent quick multi-click glitches

					$(".next").click(function(){
						if(animating) return false;
						animating = true;
						
						current_fs = $(this).parent();
						next_fs = $(this).parent().next();
						
						//activate next step on progressbar using the index of next_fs
						$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
						
						//show the next fieldset
						next_fs.show(); 
						//hide the current fieldset with style
						current_fs.animate({opacity: 0}, {
							step: function(now, mx) {
								//as the opacity of current_fs reduces to 0 - stored in "now"
								//1. scale current_fs down to 80%
								scale = 1 - (1 - now) * 0.2;
								//2. bring next_fs from the right(50%)
								left = (now * 50)+"%";
								//3. increase opacity of next_fs to 1 as it moves in
								opacity = 1 - now;
								current_fs.css({'transform': 'scale('+scale+')'});
								next_fs.css({'left': left, 'opacity': opacity});
							}, 
							duration: 800, 
							complete: function(){
								current_fs.hide();
								animating = false;
							}, 
							//this comes from the custom easing plugin
							easing: 'easeInOutBack'
						});
					});

					$(".previous").click(function(){
						if(animating) return false;
						animating = true;
						
						current_fs = $(this).parent();
						previous_fs = $(this).parent().prev();
						
						//de-activate current step on progressbar
						$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
						
						//show the previous fieldset
						previous_fs.show(); 
						//hide the current fieldset with style
						current_fs.animate({opacity: 0}, {
							step: function(now, mx) {
								//as the opacity of current_fs reduces to 0 - stored in "now"
								//1. scale previous_fs from 80% to 100%
								scale = 0.8 + (1 - now) * 0.2;
								//2. take current_fs to the right(50%) - from 0%
								left = ((1-now) * 50)+"%";
								//3. increase opacity of previous_fs to 1 as it moves in
								opacity = 1 - now;
								current_fs.css({'left': left});
								previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
							}, 
							duration: 800, 
							complete: function(){
								current_fs.hide();
								animating = false;
							}, 
							//this comes from the custom easing plugin
							easing: 'easeInOutBack'
						});
					});
					
				});
			</script>
		
	</div>
</div>