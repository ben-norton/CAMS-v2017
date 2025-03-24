<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('project_name', 'Project Name:', ['class' => 'control-label']) !!}
            {!! Form::text('project_name', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('project_shortname', 'Collection Short Name:', ['class' => 'control-label']) !!}
            {!! Form::text('project_shortname', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('project_slug', 'Collection Slug:', ['class' => 'control-label']) !!}
            {!! Form::text('project_slug', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('s3_bucket_name', 'S3 Bucket (/Folder) Name:', ['class' => 'control-label']) !!}
            {!! Form::text('s3_bucket_name', null, ['class'=> 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('project_url', 'Project URL:', ['class' => 'control-label']) !!}
            {!! Form::text('project_url', null, ['class'=> 'form-control']) !!}
        </div>
    </div>    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:', ['class' => 'control-label']) !!}
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                {!! Form::text('start_date', null, ['class'=> 'form-control datepicker']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group">
            {!! Form::label('end_date', 'End Date:', ['class' => 'control-label']) !!}
            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                {!! Form::text('end_date', null, ['class'=> 'form-control datepicker']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="form-group active-rbs">
            <label class="control-label">Active Project?</label>
            <ul class="rbs-list">
                <li>
                    <label class="checkbox-inline">
                        <input name="active_yn" value="1" class="active_yn" type="radio">Yes
                    </label>
                </li>
                <li>
                    <label class="checkbox-inline">
                        <input name="active_yn" value="0" class="active_yn" type="radio" checked="checked">No
                    </label>
                </li>
            </ul>
        </div>
    </div>
</div>
<style>
    ul.rbs-list {
        list-style-type: none;
        padding-left: 0;
    }
    .rbs-list li label input[type=radio]{
        margin-right: 10px;
    }
</style>
<fieldset>
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div class="form-group">
                {!! Form::label('contact_fname', 'Contact First Name:', ['class' => 'control-label']) !!}
                {!! Form::text('contact_fname', null, ['class'=> 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="form-group">
                {!! Form::label('contact_lname', 'Contact Last Name:', ['class' => 'control-label']) !!}
                {!! Form::text('contact_lname', null, ['class'=> 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="form-group">
                {!! Form::label('contact_email', 'Contact Email:', ['class' => 'control-label']) !!}
                {!! Form::text('contact_email', null, ['class'=> 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="form-group">
                {!! Form::label('contact_phone', 'Contact Phone:', ['class' => 'control-label']) !!}
                {!! Form::text('contact_phone', null, ['class'=> 'form-control']) !!}
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label']) !!}
                {!! Form::textarea('remarks', null, ['class'=> 'form-control', 'size' => '30x2']) !!}
            </div>
        </div>
    </div>
</fieldset>

<div class="row btn-row">
    <div class="form-group">
        {!! Form::submit($submitTextButton, array('class' => $btnclass)) !!}
    </div>
</div>






