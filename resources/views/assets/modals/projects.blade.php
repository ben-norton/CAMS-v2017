<!-- Modal -->
<div id="projectModal" class="modal modal-primary" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Associate Project</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'assets/projects/add']) !!}
                {!! Form::hidden('asset_id', $asset->id, ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('project_id', 'Please specify the project:', ['class' => 'control-label']) !!}
                            <select class="project_id form-control" id="project_id" name="project_id">
                                <option value=""></option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>
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