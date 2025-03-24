<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('parameter_id', 'Media Type:', ['class' => 'control-label']) !!}
            {!! Form::select('parameter_id', $parameterKeys, null, ['class'=> 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label']) !!}
            {!! Form::textarea('remarks', null, ['class'=> 'form-control', 'size' => '30x2']) !!}
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::submit($submitTextButton, array('class' => $btnclass)) !!}
</div>





