<!-- Modal -->
<div id="metadataModal" class="modal modal-primary" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Metadata</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'projects/metadata/add']) !!}
                {!! Form::hidden('project_id', $project->id, ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('key', 'Please Select Metadata Key:', ['class' => 'control-label']) !!}
                            <select class="metakey form-control" id="metakey" name="metakey">
                                <option value=""></option>
                                @foreach($metakeys as $k => $v)
                                    <option value="{{ $v->id }}">{{ $v->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('metavalue', 'Enter Metadata Key Value:', ['class' => 'control-label']) !!}
                            {!! Form::text('metavalue', null, ['class'=> 'catalog_number form-control']) !!}
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