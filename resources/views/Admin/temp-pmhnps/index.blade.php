@extends('Admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-12">

						{{-- <div class="mb-3 d-flex justify-content-end"><a href="{{ route('pmhnps.create') }}" class="btn btn-info">Create</a></div> --}}

						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>id</th>
										<th>name</th>
										<th>email</th>
										{{-- <th>Status</th> --}}
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($temp_pmhnps as $pmhnp)
										<tr>
											<td>{{ $pmhnp->id }}</td>
											<td>{{ $pmhnp->name }}</td>
											<td>{{ $pmhnp->email }}</td>
											{{-- <td>Active</td> --}}


											<td>
												<div >
													{{-- <a href="{{ route('pmhnps.show', [$pmhnp->id]) }}" class="btn btn-info">Show</a> --}}
													{{-- <a href="{{ route('pmhnps.edit', [$pmhnp->id]) }}" class="btn btn-primary">Edit</a> --}}
													{{-- {!! Form::open(['method' => 'DELETE','route' => ['temp-pmhnps.destroy', $pmhnp->id]]) !!}
														{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
													{!! Form::close() !!} --}}

													<form id="deleteForm" action="{{ route('temp-pmhnps.destroy', $pmhnp->id) }}" method="POST">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
													</form>
													
													
													
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							{!! $temp_pmhnps->links() !!}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
<script>
	function confirmDelete() {
		return confirm('Are you sure you want to delete this item?');
	}
</script>

