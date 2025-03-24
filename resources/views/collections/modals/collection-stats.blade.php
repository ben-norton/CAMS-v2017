<!-- Modal -->
<div id="collectionStatsModal" class="modal modal-primary" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Collection Stat</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => '/stats/add']) !!}
                {!! Form::hidden('collection_id', $collection->id, ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('parameter_id', 'Select Stat Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('parameter_id', $statTypes, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('value_dec', 'Enter Value (Number):', ['class' => 'control-label']) !!}
                            {!! Form::text('value_dec', null, ['class'=> 'form-control']) !!}
                        </div>
                        <p class="help-text">Stat must be a number with a maximum of 14 total digits with four decimal places</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('value_str', 'Enter Value (String):', ['class' => 'control-label']) !!}
                            {!! Form::text('value_str', null, ['class'=> 'form-control']) !!}
                        </div>
                        <p class="help-text">Stat must contain non-numeric values - combination of alphabetic and numeric values</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('frequency', 'Stat Frequency:', ['class' => 'control-label']) !!}
                            {!! Form::select('frequency', $frequencies, null, ['class'=> 'frequency form-control']) !!}
                        </div>
                        <p class="help-text">Stats that occur at regular intervals</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('stat_day', 'Stat Day:', ['class' => 'control-label']) !!}
                            {!! Form::text('stat_day', null, ['class'=> 'form-control']) !!}
                        </div>
                        <p class="help-text">Format: DD (e.g. 13)</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('stat_month', 'Stat Month:', ['class' => 'control-label']) !!}
                            {!! Form::select('stat_month', $statMonths, null, ['class'=> 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('stat_year', 'Stat Year:', ['class' => 'control-label']) !!}
                            {!! Form::text('stat_year', null, ['class'=> 'form-control']) !!}
                        </div>
                        <p class="help-text">Format: YYYY (e.g. 2017)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('external_link', 'External Link:', ['class' => 'control-label']) !!}
                            {!! Form::text('external_link', null, ['class'=> 'form-control']) !!}
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('source', 'Stat Source:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('source', null, ['class'=> 'form-control', 'size' => '30x2']) !!}
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