<x-admin-master>
	@section('content')
		@if(session('role-update'))
			<div class="alert alert-success">{{ session('role-update') }}</div>
		@endif
		<div class="row">
			<div class="col-sm-3">
				<form action="{{ route('role.update', $role) }}" method="post">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" name="name">
					</div>
				@error('name')
					<p class="text-danger">{{ $message }}</p>
				@enderror
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	@if($permissions->isNotEmpty())
		<div class="row mt-4">
			<div class="col-lg-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Option</th>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Option</th>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
								@foreach($permissions as $permission)
									<tr>
										<td>
											<input type="checkbox" 
											@foreach($role->permissions as $role_permission) 
												@if($role_permission->slug == $permission->slug)
													checked
												@endif
											@endforeach>
										</td>
										<td>{{ $permission->id }}</td>
										<td>{{ $permission->name }}</td>
										<td>{{ $permission->slug }}</td>
										<td>
											<form action="{{ route('permission.attach', $role->id) }}" method="post">
												@csrf
												@method('PUT')
												<input type="hidden" name="permission" value="{{ $permission->id }}">
												<button type="submit" class="btn btn-primary"
												@if($role->permissions->contains($permission->id))
													disabled
												@endif
												>Attach</button>
											</form>
										</td>
										<td>
											<form action="{{ route('permission.detach', $role->id) }}" method="post">
												@csrf
												@method('PUT')
												<input type="hidden" name="permission" value="{{ $permission->id }}">
												<button type="submit" class="btn btn-danger"
												@if(!$role->permissions->contains($permission->id))
													disabled
												@endif
												>Detach</button>
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
	@endif

	@endsection
</x-admin-master>