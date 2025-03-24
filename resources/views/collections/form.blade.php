<div class="row">
    <div class="col-sm-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('collection_name', 'Collection Official Name:', ['class' => 'control-label']) !!}
            {!! Form::text('collection_name', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('collection_shortname', 'Collection Short Name:') !!}
            {!! Form::text('collection_shortname', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('collection_slug', 'Collection Slug:') !!}
            {!! Form::text('collection_slug', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
</div>
<fieldset>
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('collection_manager_fname', 'Collections Manager First Name:', ['class' => 'control-label']) !!}
            {!! Form::text('collection_manager_fname', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('collection_manager_lname', 'Collections Manager Last Name:', ['class' => 'control-label']) !!}
            {!! Form::text('collection_manager_lname', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('collection_manager_email', 'Collections Manager Email:', ['class' => 'control-label']) !!}
            {!! Form::text('collection_manager_email', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('collection_manager_phone', 'Collections Manager Phone:', ['class' => 'control-label']) !!}
            {!! Form::text('collection_manager_phone', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
</div>
</fieldset>

<fieldset>
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('curator_fname', 'Curator First Name:', ['class' => 'control-label']) !!}
            {!! Form::text('curator_fname', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('curator_lname', 'Curator Last Name:', ['class' => 'control-label']) !!}
            {!! Form::text('curator_lname', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('curator_email', 'Curator Email:', ['class' => 'control-label']) !!}
            {!! Form::text('curator_email', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('curator_phone', 'Curator Phone:', ['class' => 'control-label']) !!}
            {!! Form::text('curator_phone', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
</div>
</fieldset>

<div class="row btn-row">
    <div class="form-group">
        {!! Form::submit($submitTextButton, array('class' => $btnclass)) !!}
    </div>
</div>





