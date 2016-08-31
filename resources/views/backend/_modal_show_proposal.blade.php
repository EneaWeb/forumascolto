<div class="modal-dialog animated zoomIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="smallModalHead">
                Proposta #{!!$proposal->id!!}
            </h4>
        </div>
        <div class="modal-body">
            
            <div class="col-md-12">
                <img src="/uploads/proposals/{!!$proposal->picture!!}" style="max-width:40%; margin:20px; float:left;" />
                <div class="">
                    <br>
                    <h6>{!!$proposal->user->name!!}<br>
                    <i class="fa fa-star-o"></i> {!!$proposal->likes!!} Preferenze</h6>
                    <br>
                    <h3>{!!$proposal->title!!}</h3>
                    <h6> Area di riferimento: {!!$proposal->type->name!!}</h6>

                    <p><u>Descrizione breve:</u><br>{!!$proposal->description_short!!}</p>
                </div>
                
            </div>
            <p style="margin:30px"><u>Descrizione estesa:</u><br>{!!$proposal->description_long!!}</p>
            
        </div>
    </div>
</div>