@extends('backend.layout.main')

@section('content')                
    <div class="page-content-wrap">
        
        <div class="page-title">                    
            <h2>Admin Dashboard</h2>
        </div>
        {{-- START WIDGETS --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button href="#" data-toggle="modal" data-target="#modal_add_post" class="btn btn-danger"><span class="fa fa-pencil"></span>NUOVO POST</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- END WIDGETS --}}
    </div>
    
@stop