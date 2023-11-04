@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('pmhnps.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pmhnps as $pmhnp)

				<tr>
					<td>{{ $pmhnp->id }}</td>
					<td>{{ $pmhnp->name }}</td>
					<td>{{ $pmhnp->email }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('pmhnps.show', [$pmhnp->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('pmhnps.edit', [$pmhnp->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['pmhnps.destroy', $pmhnp->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
