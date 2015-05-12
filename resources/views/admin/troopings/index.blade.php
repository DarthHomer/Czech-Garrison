@extends ('app')

@section ('content')

	<h1>Troopings - index</h1>

	@include('flash::message')

	{!! link_to_route('troopings.create', 'Přidat událost', [], ['class' => 'btn btn-default']) !!}

	<div class="panel panel-default">
		<div class="panel-heading">Všechny události</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Název události</th>
						<th>Datum událost</th>
						<th>Stav událost</th>
						<th>Akce</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($troopings as $trooping)
						<tr>
							<td>{{ $trooping['id'] }}</td>
							<td>{{ $trooping['title'] }}</td>
							<td>{{ $trooping['started_at'].' - '.$trooping['ended_at'] }}</td>
							<td>{{ $trooping['published_as_upcoming_at'] }}</td>
							<td>
								{!! link_to_route('troopings.edit', 'Upravit událost', $trooping['id'], ['class' => 'btn btn-default']) !!}
								{!! Form::open(['route' => ['troopings.destroy', $trooping['id']], 'method' => 'delete']) !!}
									{!! Form::submit('Smazat událost', ['class' => 'btn btn-default']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection