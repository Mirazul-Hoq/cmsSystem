<x-admin-master>
	@section('content')
	@if(session('permission-delete'))
		<div class="alert alert-danger">{{ session('permission-delete') }}</div>
	@elseif(session('permission-update'))
		<div class="alert alert-success">{{ session('permission-update') }}</div>
	@endif
		<div class="row">
			<div class="col-sm-3">
				<form action="{{ route('permission.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Permission name" name="name">
					</div>
				@error('name')
					<p class="text-danger">{{ $message }}</p>
				@enderror
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
			<div class="col-sm-9">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($permissions as $permission)
									<tr>
										<td>{{ $permission->id }}</td>
										<td><a href="{{ route('permission.edit', $permission) }}">{{ $permission->name }}</a></td>
										<td>{{ $permission->slug }}</td>
										<td>
											<form action="{{ route('permission.destroy', $permission) }}" method="post">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
	@endsection
</x-admin-master>