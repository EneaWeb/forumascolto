<div class="modal-dialog animated zoomIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="smallModalHead">
                Modifica post #{!!$post->id!!}
            </h4>
        </div>
        <div class="modal-body">
        
            {!!Form::open(['url'=>'/admin/post/edit', 'method'=>'POST', 'files'=>true, 'class'=>'form-horizontal'])!!}
            
                {!!Form::hidden('id', $post->id)!!}
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Titolo</label>
                    <div class="col-md-10">
                        {!!Form::input('text', 'title', $post->title , ['class'=>'form-control', 'placeholder'=>'Titolo del Post'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Immagine</label>
                    <img src="/uploads/posts/{!!$post->picture!!}" style="max-width:100px"/>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Cambia Immagine</label>
                    <div class="col-md-10">
                        {!!Form::file('picture', ['class'=>'fileinput btn-warning'])!!}
                    </div>
                </div>   
                <div class="form-group">
                    <label class="col-md-2 control-label">Contenuto</label>
                    <div class="col-md-10">
                        {!!Form::textarea('content', $post->content, ['class="form-control textarea', 'id'=>'textarea-editor', 'placeholder'=>'Contenuto del Post', 'rows'=>'20'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        {!!Form::submit('SALVA', ['class'=>'btn btn-success'])!!}
                    </div>
                </div>                     
            {!!Form::close()!!}
        </div>
    </div>
</div>