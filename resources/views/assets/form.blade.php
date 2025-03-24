<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-12 outer-form-col">
        <div class="row">
            <div class="col-md-6 col-sm-12">            
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    <a class="tooltip-btn tip" title="Title of the Asset">
					    <i class="fa fa-question"></i>
		        	</a>
                    {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label('source', 'Source:') !!}
                    <a class="tooltip-btn tip" title="Source of the Asset">
					    <i class="fa fa-question"></i>
		        	</a>
                    {!! Form::text('source', null, ['class'=> 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label('public_yn', 'Publicaly Available?', [ 'class' => 'control-label']) !!}
                    <a class="tooltip-btn tip" title="Whether or not to keep the asset private, only accessible through CAMS">
					    <i class="fa fa-question"></i>
		        	</a><br>
                    <label class="rb-label">
                        {!! Form::radio('public_yn', 1, true, ['class' => 'input-rb']) !!}
                        <span>Yes</span>
                    </label>
                    <label class="rb-label">
                        {!! Form::radio('public_yn', 0, false, ['class' => 'input-rb']) !!}
                        <span>No</span>
                    </label>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {!! Form::label('asset_type_id', 'Asset Type:') !!}
                    <a class="tooltip-btn tip" title="The Type of Asset">
					    <i class="fa fa-question"></i>
		        	</a>
                    {!! Form::select('asset_type_id', $assetTypes, null, ['class'=> 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('remarks', 'Remarks:') !!}
                    <a class="tooltip-btn tip" title="Enter any important remarks regarding the asset">
					    <i class="fa fa-question"></i>
		        	</a>
                    {!! Form::textarea('remarks', null, ['class'=> 'form-control', 'size' => '30x2']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('image_file', 'Upload File') !!}
                    {!! Form::file('image_file', array('id' => 'image_file', 'class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label('attribution_required_yn', 'Attribution/Citation Required?', [ 'class' => 'control-label']) !!}
                    <a class="tooltip-btn tip" title="Whether or not a citation or attribution is required to use the image">
					    <i class="fa fa-question"></i>
		        	</a><br>
                    <label class="rb-label">
                        {!! Form::radio('attribution_required_yn', 1, false, ['class' => 'input-rb']) !!}
                        <span>Yes</span>
                    </label>
                    <label class="rb-label">
                        {!! Form::radio('attribution_required_yn', 0, true, ['class' => 'input-rb']) !!}
                        <span>No</span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label('attribution', 'Attribution/Citation:', [ 'class' => 'control-label']) !!}
                    <a class="tooltip-btn tip" title="Attribution/Citation text">
					    <i class="fa fa-question"></i>
		        	</a>
                    {!! Form::text('attribution', null, ['class'=> 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label('usage_restrictions_yn', 'Usage Restrictions?', [ 'class' => 'control-label']) !!}
                    <a class="tooltip-btn tip" title="Whether or not there are restrictions to the usage of the asset">
					    <i class="fa fa-question"></i>
		        	</a><br>
                    <label class="rb-label">
                        {!! Form::radio('usage_restrictions_yn', 1, false, ['class' => 'input-rb']) !!}
                        <span>Yes</span>
                    </label>
                    <label class="rb-label">
                        {!! Form::radio('usage_restrictions_yn', 0, true, ['class' => 'input-rb']) !!}
                        <span>No</span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    {!! Form::label('license_type', 'License:', [ 'class' => 'control-label']) !!}
                    <a class="tooltip-btn tip" title="Terms of use license for asset">
					    <i class="fa fa-question"></i>
		        	</a>
                    {!! Form::text('license_type', null, ['class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="row">
	            <div class="col-md-12 col-sm-12">
	                <div class="form-group">
	                    {!! Form::label('restriction_remarks', 'Usage Remarks:', [ 'class' => 'control-label']) !!}
	                    <a class="tooltip-btn tip" title="Any remarks regarding the usage of the asset, including both citation and license">
						    <i class="fa fa-question"></i>
			        	</a>
	                    {!! Form::textarea('restriction_remarks', null, ['class'=> 'form-control', 'size' => '30x2']) !!}
	                </div>
	            </div>
           </div>
        </div>
    </div><!-- outer-form-col end -->
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-4 col-xs-12">
        {!! Form::submit($submitTextButton, array('class' => $btnclass)) !!}
    </div>
</div>
