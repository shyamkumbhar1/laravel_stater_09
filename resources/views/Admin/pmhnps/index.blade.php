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
										<th>Professional Title</th>
										<th>email</th>
										<th>Phone Number</th>
										<th>Professional Licence Number</th>
										<th>Created At</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($pmhnps as $pmhnp)

										<tr>
											<td>{{ $pmhnp->id }}</td>
											<td>{{ $pmhnp->name }}</td>
											<td>{{ $pmhnp->professional_title }}</td>
											<td>{{ $pmhnp->email }}</td>
											<td>{{ $pmhnp->phone_number }}</td>
											<td>{{ $pmhnp->professional_license_number }}</td>
											<td>{{ $pmhnp->created_at }}</td>
											<td>Active</td>


											<td>
												<div >
													<a href="{{ route('pmhnps.show', [$pmhnp->id]) }}" class="btn btn-info">Show</a>
													<a href="{{ route('pmhnps.edit', [$pmhnp->id]) }}" class="btn btn-primary">Edit</a>
													{{-- {!! Form::open(['method' => 'DELETE','route' => ['pmhnps.destroy', $pmhnp->id]]) !!}
														{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
													{!! Form::close() !!} --}}
													{!! Form::open(['method' => 'DELETE', 'route' => ['pmhnps.destroy', $pmhnp->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this item?");']) !!}
    												{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
													{!! Form::close() !!}

												</div>
											</td>
										</tr>

									@endforeach
								</tbody>
							</table>	
							{!! $pmhnps->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- ./wrapper -->


	@endsection

@section('scripts')

