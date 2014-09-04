@include('layouts.datatables')
<div class="row">
	<div class="large-12 columns">
		<h2>{{Lang::get('notaries.notaries--title')}}</h2>
{{HTML::linkAction('NotariesController@getNew', Lang::get('notaries.button--new'), array(), array('class' => 'tiny button'))}}
		@if($notaries->isEmpty())
		<div class="margin--top">
			{{Lang::get('notaries.notaries--none')}}
		</div>
		@else
		<table class="datatable">
			<thead>
				<tr>
					<th>{{Lang::get('form.actions')}}</th>					
 					<th>{{Lang::get('notaries.id')}}</th>
 					<th>{{Lang::get('notaries.number')}}</th>
 					<th>{{Lang::get('notaries.description')}}</th>
 					<th>{{Lang::get('notaries.responsible')}}</th>
 					<th>{{Lang::get('notaries.cell_phone')}}</th>
 					<th>{{Lang::get('notaries.office_phone')}}</th>
 					<th>{{Lang::get('notaries.email')}}</th>
 					<th>{{Lang::get('notaries.curp')}}</th>
 					<th>{{Lang::get('notaries.rfc')}}</th>
 					<th>{{Lang::get('notaries.legal_name')}}</th>
 					<th>{{Lang::get('notaries.street')}}</th>
 					<th>{{Lang::get('notaries.int_number')}}</th>
 					<th>{{Lang::get('notaries.ext_number')}}</th>
 					<th>{{Lang::get('notaries.colony')}}</th>
 					<th>{{Lang::get('notaries.add_ubication')}}</th>
 					<th>{{Lang::get('notaries.city')}}</th>
 					<th>{{Lang::get('notaries.state')}}</th>
 					<th>{{Lang::get('notaries.country')}}</th>
					<th>{{Lang::get('notaries.zip_code')}}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($notaries as $notary)
				<tr>
					<td>{{HTML::Link('admin/notary/edit/'.$notary->id, Lang::get('form.edit'), array('class'=> 'button tiny message'))}}</td>					
					<td>{{$notary->id}}</td>
					<td>{{$notary->number}}</td>
					<td>{{$notary->description}}</td>
					<td>{{$notary->responsible}}</td>
					<td>{{$notary->cell_phone}}</td>
					<td>{{$notary->office_phone}}</td>
					<td>{{$notary->email}}</td>
					<td>{{$notary->curp}}</td>
					<td>{{$notary->rfc}}</td>
					<td>{{$notary->legal_name}}</td>
					<td>{{$notary->street}}</td>
					<td>{{$notary->int_number}}</td>
					<td>{{$notary->ext_number}}</td>
					<td>{{$notary->colony}}</td>
					<td>{{$notary->add_ubication}}</td>
					<td>{{$notary->city}}</td>
					<td>{{$notary->state}}</td>
					<td>{{$notary->country}}</td>
					<td>{{$notary->zip_code}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>
