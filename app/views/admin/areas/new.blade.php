@section('scripts')
	{{ HTML::script('assets/js/foundation/foundation.abide.js') }}
@stop<div class="row">
	<div class="large-8">
		<h3>{{Lang::get('areas.new--title')}}</h3>
	{{ Form::open(array('url'=>'admin/area/new/', 'class'=>'form-signin','data-abide'=>'')) }}

	<div class="number-field">
		{{ Form::label('number', Lang::get('areas.number').':') }}
		{{ Form::text('number','', array('required' => 'required', 'placeholder'=> Lang::get('areas.number') , 'maxlength' => Config::get('maxlengtharea.number') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="description-field">
		{{ Form::label('description', Lang::get('areas.description').':') }}
		{{ Form::text('description','', array('required' => 'required', 'placeholder'=> Lang::get('areas.description') ,'maxlength' => Config::get('maxlengtharea.description') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="responsible-field">
		{{Form::label('responsible', Lang::get('areas.responsible').':') }}
		{{Form::select('responsible', $userlist) }} 
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="cell_phone-field">
		{{ Form::label('cell_phone', Lang::get('areas.cell_phone').':') }}
		{{ Form::text('cell_phone','', array('required' => 'required', 'placeholder'=> Lang::get('areas.cell_phone') ,'maxlength' => Config::get('maxlengtharea.cell_phone') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="office_phone-number-field">
		{{ Form::label('office_phone', Lang::get('areas.office_phone').':') }}
		{{ Form::text('office_phone','', array('required' => 'required', 'placeholder'=> Lang::get('areas.office_phone') ,'maxlength' => Config::get('maxlengtharea.office_phone') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="email-field">
		{{ Form::label('email', Lang::get('areas.email').':') }}
		{{ Form::text('email','', array('required' => 'required', 'placeholder'=> Lang::get('areas.email') ,'maxlength' => Config::get('maxlengtharea.email') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="ubication-field">
		{{ Form::label('ubication', Lang::get('areas.ubication').':') }}
		{{ Form::text('ubication','', array('required' => 'required', 'placeholder'=> Lang::get('areas.ubication') ,'maxlength' => Config::get('maxlengtharea.ubication') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	{{ Form::submit(Lang::get('areas.add--agree'),array('class' => 'button small')) }}
	{{ Form::close() }}
</div>
</div>	
