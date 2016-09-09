@extends('backend.layout.main')

@section('content')                
    <div class="page-content-wrap">
        
        <div class="page-title">                    
            <h2>Utenti Registrati</h2>
        </div>
        {{-- START WIDGETS --}}
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">                         
                        
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper no-footer">
                                <table id="users" class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Proposte</th>
                                            <th>Facebook</th>
                                            <th>Ruolo</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{!!$user->id!!}</td>
                                                <td>{!!$user->name!!}</td>
                                                <td>{!!$user->email!!}</td>
                                                <td>{!!$user->proposals->count()!!}</td>
                                                <td><a href="http://facebook.com/{!!$user->fb_id!!}" target="_blank">{!!$user->fb_id!!}</a></td>
                                                <td>{!!ucfirst($user->roles()->value('name'))!!}</td>
                                                <td>{!!\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')!!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        {{-- END WIDGETS --}}
    </div>

    <div class="modal animated fadeIn" id="modal_add_post" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true" style="display: none;">
        <div class="modal-dialog animated zoomIn">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">
                        Nuovo Post sul Blog
                    </h4>
                </div>
                <div class="modal-body">
                
                    {!!Form::open(['url'=>'/admin/posts/create', 'method'=>'POST', 'files'=>true, 'class'=>'form-horizontal'])!!}
                    
                        <div class="form-group">
                            <label class="col-md-2 control-label">Titolo</label>
                            <div class="col-md-10">
                                {!!Form::input('text', 'title', '', ['class'=>'form-control', 'placeholder'=>'Titolo del Post'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Immagine</label>
                            <div class="col-md-10">
                                {!!Form::file('picture', ['class'=>'fileinput btn-warning'])!!}
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-md-2 control-label">Contenuto</label>
                            <div class="col-md-10">
                                {!!Form::textarea('content', '', ['class="form-control textarea', 'id'=>'textarea-editor', 'placeholder'=>'Contenuto del Post', 'rows'=>'20'])!!}
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
    </div>
    
    {{-- MODAL EDIT POST --}}
    <div class="modal animated fadeIn" 
        id="modal_edit_post" 
        tabindex="-1" 
        role="dialog" 
        aria-labelledby="smallModalHead" 
        aria-hidden="true" 
        style="display: none;">
    </div>
    {{-- END MODAL EDIT POST --}}
    
    <script>

    $(document).ready(function(){
        $('#users').DataTable( {
            "language": { "url": "/assets/js/plugins/datatables/IT.json" },
            sScrollX: "100%",
            paginate: false,
            bSort: true,
            deferRender: true,
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
            ],
        });
    })


        $('#modal_edit_post').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('post_id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
                  
            modal.empty();
            
            $.ajax({
              type: 'POST',
              url: '/modals/edit-post',
              data: { '_token' : '{!!csrf_token()!!}', id: id },
              success:function(data){
                // successful request; do something with the data
                modal.append(data);
              },
              error:function(){
                // failed request; give feedback to user
                alert('ajax error');
              }
            });
        })
    </script>
    
@stop