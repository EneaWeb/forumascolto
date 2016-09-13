<style>
.note-editing-area {
    margin-left: 0!important;
    width: 100%!important;
}
</style>

<div class="modal-dialog animated zoomIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="smallModalHead">
                Proposta #{!!$proposal->id!!}
            </h4>
        </div>
        <div class="modal-body">
            
            {!!Form::open(['url'=>'/edit-proposal', 'method'=>'POST', 'files'=>true, 'class'=>'form'])!!}
                <div class="col-md-6" style="">
                    <img id="blah" style="max-width:90%; margin-left:5%; height:auto;" src="/uploads/proposals/{!!$proposal->picture!!}" />
                </div>
                <div class="col-md-6" style="">
                    <input type="hidden" name="proposal_id" class="form-control" value="{!!$proposal->id!!}" />
                    <div class="form-group">
                        <label for="subtype_id">Titolo</label>
                        <input type="text" name="title" class="form-control" value="{!!$proposal->title!!}" />
                    </div>
                    <div class="form-group">
                        <label for="subtype_id">Area</label>
                        <select id="type_id" name="type_id" onchange="gettypes();" class="form-control">
                            @foreach(\App\Type::all() as $type)
                                @if ($type->id === $proposal->type_id)
                                    <option selected value="{!!$type->id!!}">{!!$type->name!!}</option>
                                @else
                                    <option value="{!!$type->id!!}">{!!$type->name!!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subtype_id">Tag</label>
                        <select id="subtype_id" name="subtype_id" class="form-control">
                            @foreach(\App\Subtype::where('type_id', $proposal->type_id)->get() as $subtype)
                                @if ($subtype->id === $proposal->subtype_id)
                                    <option selected value="{!!$subtype->id!!}">{!!$subtype->name!!}</option>
                                @else
                                    <option value="{!!$subtype->id!!}">{!!$subtype->name!!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input id="imgInp" type="file" name="picture" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12" style="height:40px"></div>
                <div class="col-md-12" style="">
                    <div class="form-group">
                        <label for="subtype_id">Descrizione breve</label>
                        <textarea id="form-description_short" name="description_short" value="" class="form-control summernote">
                        {!!$proposal->description_short!!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="subtype_id">Descrizione estesa</label>
                        <textarea id="form-description_long" name="description_long" class="form-control summernote">
                        {!!$proposal->description_long!!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Salva')!!}
                    </div>
                </div>
            {!!Form::close()!!}

            <script>

                $( document ).on( 'change', '#type_id', '#subtype_id', function() {

                    var type_id = $(this).val();
                    var subtype_id = $('#subtype_id');

                    $.ajax({
                        type: 'POST',
                        url: '/get-subtypes-select',
                        data: { '_token' : '{!!csrf_token()!!}', type_id : type_id },
                        success:function(data){
                            // successful request; do something with the data
                            subtype_id.empty();
                            subtype_id.html(data);
                        },
                        error:function(){
                            // failed request; give feedback to user
                            alert('ajax error');
                        }
                    });

                });

                $( document ).on( 'click', '#form-description_long', function(){
                    $('#form-description_long').summernote({
                        align: 'justifyLeft', 
                        lang: 'it-IT',
                        height: '160px'
                    });
                });

                $( document ).on( 'click', '#form-description_short', function(){
                    $('#form-description_short').summernote({
                        align: 'justifyLeft', 
                        lang: 'it-IT',
                        height: '160px'
                    });
                });

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
                        }
                      }
                      reader.readAsDataURL(input.files[0]);
                  }
                };

                $("#imgInp").change(function(){
                  readURL(this);
                });

            </script>
        </div>
    </div>
</div>