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
	   		<h3 style="text-transform:uppercase"><a href="/proposta/{!!$proposal->id!!}">{!!$proposal->title!!}</a></h3>
	   		<a href="/area/{!!$proposal->type->id!!}"># {!!$proposal->type->name!!}</a> &nbsp; 
	   		<a href="/tag/{!!$proposal->subtype->id!!}"># {!!$proposal->subtype->name!!}</a>
	   		<br>
	   		 <i class="fa fa-star" style="color:#F6DF42; margin-top:-3px"></i>
	   		 <little style="color:#CECECE; font-size:0.7em">{!!$proposal->likes!!} preferenze</little>
				<div class="feedback-box">
					<div class="client" style="margin-top:0">
						<div class="quote blue-text">
							<i class="icon-fontawesome-webfont-294"></i>
						</div>
						<div class="client-info">
							<a class="client-name" href="">{!!$proposal->user->name!!}</a>
							<div class="client-company">
								{!!$proposal->user->occupation!!}
							</div>
						</div>
						<div class="client-image hidden-xs" style="float:left; margin-left:6px; width:50px; height:50px;margin-top: 10px">
							@if ($proposal->user->fb_picture != '' && $proposal->user->fb_picture != NULL)
							   <img src="{!!$proposal->user->fb_picture!!}" alt="{!!$proposal->user->name!!}" style="max-width:45px;">
							@else
								<img src="/uploads/users/default.png" alt="{!!$proposal->user->name!!}" style="max-width:45px;">
							@endif
						</div>
					</div>
				</div>
	   	<p style="font-size:18px; line-height:28px">{!!$proposal->description_short!!} ... <a href="/proposta/{!!$proposal->id!!}"> Leggi tutto</a></p>
	   	<br><br>
	   </div>
	</div>
	
</div>