@section('scripts')
	{{ HTML::script('assets/js/foundation/foundation.abide.js') }}
@stop<div class="row">
	<div class="large-8">
		<h3>{{Lang::get('notaries.new--title')}}</h3>
	{{ Form::open(array('url'=>'admin/notary/edit/'.$notary->id, 'class'=>'form-signin','data-abide'=>'')) }}
	<div class="number-field">
		{{ Form::label('number', Lang::get('notaries.number').':') }}
		{{ Form::text('number',$notary->number, array('required' => 'required', 'placeholder'=> Lang::get('notaries.number'), 'maxlength' => Config::get('maxlengthnotary.number') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="description-field">
		{{ Form::label('description', Lang::get('notaries.description').':') }}
		{{ Form::text('description',$notary->description, array('required' => 'required', 'placeholder'=> Lang::get('notaries.description') ,'maxlength' => Config::get('maxlengthnotary.description') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="responsible-field">
		{{Form::label('responsible', Lang::get('notaries.responsible').':') }}
		{{Form::select('responsible', $userlist, $notary->responsible) }} 
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="cell_phone-field">
		{{ Form::label('cell_phone', Lang::get('notaries.cell_phone').':') }}
		{{ Form::text('cell_phone',$notary->cell_phone, array('required' => 'required', 'placeholder'=> Lang::get('notaries.cell_phone') ,'maxlength' => Config::get('maxlengthnotary.cell_phone') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="office_phone-number-field">
		{{ Form::label('office_phone', Lang::get('notaries.office_phone').':') }}
		{{ Form::text('office_phone',$notary->office_phone, array('required' => 'required', 'placeholder'=> Lang::get('notaries.office_phone') ,'maxlength' => Config::get('maxlengthnotary.office_phone') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="email-field">
		{{ Form::label('email', Lang::get('notaries.email').':') }}
		{{ Form::text('email',$notary->email, array('required' => 'required', 'placeholder'=> Lang::get('notaries.email') ,'maxlength' => Config::get('maxlengthnotary.email') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="curp-field">
		{{ Form::label('curp', Lang::get('notaries.curp').':') }}
		{{ Form::text('curp',$notary->curp, array('required' => 'required', 'placeholder'=> Lang::get('notaries.curp'), 'pattern' => '[A-Z][AEIOUX][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][MH][A-Z][BCDFGHJKLMNÑPQRSTVWXYZ]{4}[0-9A-Z][0-9]' ,'maxlength' => Config::get('maxlengthnotary.curp') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="rfc-field">
		{{ Form::label('rfc', Lang::get('notaries.rfc').':') }}
		{{ Form::text('rfc',$notary->rfc, array('required' => 'required', 'placeholder'=> Lang::get('notaries.rfc'), 'pattern'=> '[A-ZÑ&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9]([A-Z0-9]{3})' ,'maxlength' => Config::get('maxlengthnotary.rfc')  )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="legal_name-field">
		{{ Form::label('legal_name', Lang::get('notaries.legal_name').':') }}
		{{ Form::text('legal_name',$notary->legal_name, array('required' => 'required', 'placeholder'=> Lang::get('notaries.legal_name') ,'maxlength' => Config::get('maxlengthnotary.legal_name') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="street-field">
		{{ Form::label('street', Lang::get('notaries.street').':') }}
		{{ Form::text('street',$notary->street, array('required' => 'required', 'placeholder'=> Lang::get('notaries.street') ,'maxlength' => Config::get('maxlengthnotary.street') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="int_number-field">
		{{ Form::label('int_number', Lang::get('notaries.int_number').':') }}
		{{ Form::text('int_number',$notary->int_number, array('required' => 'required', 'placeholder'=> Lang::get('notaries.int_number') ,'maxlength' => Config::get('maxlengthnotary.int_number') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="ext_number-field">
		{{ Form::label('ext_number', Lang::get('notaries.ext_number').':') }}
		{{ Form::text('ext_number',$notary->ext_number, array('required' => 'required', 'placeholder'=> Lang::get('notaries.ext_number') ,'maxlength' => Config::get('maxlengthnotary.ext_number') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="colony-field">
		{{ Form::label('colony', Lang::get('notaries.colony').':') }}
		{{ Form::text('colony',$notary->colony, array('required' => 'required', 'placeholder'=> Lang::get('notaries.colony') ,'maxlength' => Config::get('maxlengthnotary.colony') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="add_ubication-field">
		{{ Form::label('add_ubication', Lang::get('notaries.add_ubication').':') }}
		{{ Form::text('add_ubication',$notary->add_ubication, array('required' => 'required', 'placeholder'=> Lang::get('notaries.add_ubication') ,'maxlength' => Config::get('maxlengthnotary.add_ubication') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="city-field">
		{{ Form::label('city', Lang::get('notaries.city').':') }}
		{{ Form::text('city',$notary->city, array('required' => 'required', 'placeholder'=> Lang::get('notaries.city') ,'maxlength' => Config::get('maxlengthnotary.city') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="state-field">
		{{ Form::label('state', Lang::get('notaries.state').':') }}
		{{ Form::text('state',$notary->state, array('required' => 'required', 'placeholder'=> Lang::get('notaries.state') ,'maxlength' => Config::get('maxlengthnotary.state') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>
	<div class="country-field">
		{{ Form::label('country', Lang::get('notaries.country').':') }}
		{{ Form::text('country',$notary->country, array('required' => 'required', 'placeholder'=> Lang::get('notaries.country') ,'maxlength' => Config::get('maxlengthnotary.country') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>

	<div class="zip_code-field">
		{{ Form::label('zip_code', Lang::get('notaries.zip_code').':') }}
		{{ Form::text('zip_code',$notary->zip_code, array('required' => 'required', 'placeholder'=> Lang::get('notaries.zip_code') ,'maxlength' => Config::get('maxlengthnotary.zip_code') )) }}
	<small class="error">{{Lang::get('form.error--empty')}}</small>
	</div>

	{{ Form::submit(Lang::get('notaries.edit--agree'),array('class' => 'button small')) }}
	{{ Form::close() }}
</div>
</div>	
