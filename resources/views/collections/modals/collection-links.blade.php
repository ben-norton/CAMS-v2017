<!-- Modal -->
<div id="collectionLinksModal" class="modal modal-primary" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Collection Link</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/links/add']) !!}
                {!! Form::hidden('collection_id', $collection->id, ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('parameter_id', 'Select Link Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('parameter_id', $linkTypes, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('url', 'Enter URL:', ['class' => 'control-label']) !!}
                            {!! Form::text('url', null, ['class'=> 'catalog_number form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('remarks', null, ['class'=> 'form-control', 'size' => '30x2']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-default btn-success" >Add</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>