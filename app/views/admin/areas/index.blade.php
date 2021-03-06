@include('layouts.datatables')
<div class="row">
	<div class="large-12 columns">
		<h2>{{Lang::get('areas.areas--title')}}</h2>
{{HTML::linkAction('AreasController@getNew', Lang::get('areas.button--new'), array(), array('class' => 'tiny button'))}}
		@if($areas->isEmpty())
		<div class="margin--top">
			{{Lang::get('areas.areas--none')}}
		</div>
		@else
		<table class="datatable">
			<thead>
				<tr>
					<th>{{Lang::get('form.actions')}}</th>					
 					<th>{{Lang::get('areas.id')}}</th>
 					<th>{{Lang::get('areas.number')}}</th>
 					<th>{{Lang::get('areas.description')}}</th>
 					<th>{{Lang::get('areas.responsible')}}</th>
 					<th>{{Lang::get('areas.cell_phone')}}</th>
 					<th>{{Lang::get('areas.office_phone')}}</th>
 					<th>{{Lang::get('areas.email')}}</th>
					<th>{{Lang::get('areas.ubication')}}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($areas as $area)
				<tr>
					<td>{{HTML::Link('admin/area/edit/'.$area->id, Lang::get('form.edit'), array('class'=> 'button tiny message'))}}</td>					
					<td>{{$area->id}}</td>
					<td>{{$area->number}}</td>
					<td>{{$area->description}}</td>
					<td>{{$area->responsible}}</td>
					<td>{{$area->cell_phone}}</td>
					<td>{{$area->office_phone}}</td>
					<td>{{$area->email}}</td>
					<td>{{$area->ubication}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>
