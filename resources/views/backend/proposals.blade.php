@extends('backend.layout.main')

@section('content')                
    <div class="page-content-wrap">
        
        <div class="page-title">                    
            <h2>Proposte</h2>
        </div>
        {{-- START WIDGETS --}}
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                                            
                        <div class="btn-group pull-right">
                            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Esporta</button>
                            <ul class="dropdown-menu">
                                <li><a href="#" onClick ="$('#coupons').tableExport({type:'excel',escape:'false'});">
                                    <i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i> Excel
                                </a></li>
                                <li><a href="#" onClick ="$('#coupons').tableExport({type:'png',escape:'false'});">
                                    <i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i> PNG
                                </a></li>
                                <li><a href="#" onClick ="$('#coupons').tableExport({type:'pdf',escape:'false'});">
                                    <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i> PDF
                                </a></li>
                            </ul>
                        </div>                                    
                        
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper no-footer">
                                <table id="coupons" class="table table-condensed datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Utente</th>
                                            <th>Titolo</th>
                                            <th>Area</th>
                                            <th>Tag</th>
                                            <th>Stato</th>
                                            <th>Likes</th>
                                            <th>Data</th>
                                            <th>Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($proposals as $proposal)
                                            <tr>
                                                <td style="width:50px">{!!$proposal->id!!}</td>
                                                <td>{!!$proposal->user->name!!}</td>
                                                <td>{!!$proposal->title!!}</td>
                                                <td>{!!$proposal->type->name!!}</td>
                                                <td>{!!$proposal->subtype->name!!}</td>
                                                <td>{!! ucfirst($proposal->status) !!}
                                                <td>{!! $proposal->likes !!}
                                                <td>{!!\Carbon\Carbon::parse($proposal->created_at)->format('d/m/Y')!!}
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#modal_show_proposal" data-proposal_id="{!!$proposal->id!!}"><span class="fa fa-eye"></span>
                                                    &nbsp;
                                                    @if ($proposal->status == 'da vedere')
                                                        <a href="#" onClick="confirm_confirm_proposal({!!$proposal->id!!});"><span class="fa fa-check" style="color:green"></span>
                                                        &nbsp;
                                                        <a href="#" onClick="confirm_deactivate_proposal({!!$proposal->id!!});" style="color:red"><span class="fa fa-ban"></span></a>
                                                    @elseif ($proposal->status == 'approvata')
                                                        <a href="#" onClick="confirm_deactivate_proposal({!!$proposal->id!!});" style="color:red"><span class="fa fa-ban"></span></a>
                                                    @elseif ($proposal->status == 'non approvata')
                                                        <a href="#" onClick="confirm_confirm_proposal({!!$proposal->id!!});"><span class="fa fa-check" style="color:green"></span>
                                                    @endif
                                                </td>
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

 
    {{-- MODAL EDIT POST --}}
    <div class="modal animated fadeIn" 
        id="modal_show_proposal" 
        tabindex="-1" 
        role="dialog" 
        aria-labelledby="smallModalHead" 
        aria-hidden="true" 
        style="display: none;">
    </div>
    {{-- END MODAL EDIT POST --}}
    
    <script>
        $('#modal_show_proposal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('proposal_id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
                  
            modal.empty();
            
            $.ajax({
              type: 'POST',
              url: '/modals/show-proposal',
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