<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('display_name', 'Display Name:', ['class' => 'control-label']) !!}
            {!! Form::text('display_name', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('variable', 'Variable:', ['class' => 'control-label']) !!}
            {!! Form::text('variable', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('model', 'Model:', ['class' => 'control-label']) !!}
            {!! Form::select('model', $models, null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('parameter_type', 'Parameter Type:', ['class' => 'control-label']) !!}
            {!! Form::select('parameter_type', $parameterTypes, null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('source_name', 'Source Name:', ['class' => 'control-label']) !!}
            {!! Form::text('source_name', null, ['class'=> 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="form-group">
            {!! Form::label('source_url', 'Source URL:', ['class' => 'control-label']) !!}
            {!! Form::text('source_url', null, ['class'=> 'form-control']) !!}
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





