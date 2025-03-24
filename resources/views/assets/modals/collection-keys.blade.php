<div id="collectionKeysModal" class="modal modal-primary" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Associate Collection Key</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/collection/keys/add']) !!}
                {!! Form::hidden('asset_id', $asset->id, ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('key_type_id', 'Select Key:', ['class' => 'control-label']) !!}
                            <select name="key_type_id" class="form-control">
                                <option value="null"></option>
                                @foreach($collectionKeyTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('key_value', 'Enter Value:', ['class' => 'control-label']) !!}
                            {!! Form::text('key_value', null, ['class'=> 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('collection_id', 'Please Specify Collection:', ['class' => 'control-label']) !!}
                            <select class="collection_id form-control" id="collection_id" name="collection_id">
                                <option value=""></option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection->id }}">{{ $collection->collection_name }}</option>
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