@extends ('app')

@section ('content')

	<h1>Troopings - create</h1>

	@include ('flash::message')

	<div class="panel panel-default">
		<div class="panel-heading">Přidat událost</div>
		<div class="panel-body">

			{!! Form::open(['route' => 'troopings.store', 'class' => 'form-horizontal']) !!}

				<div class="form-group">
					{!! Form::label('title', 'Název události', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-4">
						{!! Form::text('title', null, ['class' => 'form-control']) !!}
						<small class="text-danger">{!! $errors->first('title') !!}</small>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('started_at', 'Začátek události', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-2">
						{!! Form::date('started_at', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
						<small class="text-danger">{!! $errors->first('started_at') !!}</small>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('ended_at', 'Konec události', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-2">
						{!! Form::date('ended_at', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
						<small class="text-danger">{!! $errors->first('ended_at') !!}</small>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('place', 'Místo konání', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-4">
						{!! Form::text('place', null, ['class' => 'form-control']) !!}
						<small class="text-danger">{!! $errors->first('place') !!}</small>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('website_link', 'Oficiální stránka události', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-4">
						{!! Form::text('website_link', null, ['class' => 'form-control']) !!}
						<small class="text-danger">{!! $errors->first('website_link') !!}</small>
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('teaser', 'Upoutávka', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-6">
						{!! Form::textarea('teaser', null, ['class' => 'form-control']) !!}
						<small class="text-danger">{!! $errors->first('teaser') !!}</small>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-3">
						<label class="radio-inline">
							{!! Form::radio('published_status', false, true) !!} Nepublikováno
						</label>
						<label class="radio-inline">
							{!! Form::radio('published_status', true) !!} Publikováno
						</label>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-4">
						{!! Form::submit('Vytvořit událost', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}

		</div>
	</div>

@endsection