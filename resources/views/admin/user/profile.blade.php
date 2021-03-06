<x-admin-master>
	
	@section('content')

		<h1 class="mb-4">USER PROFILE of {{ $user->name }}</h1>

		<div class="row mb-4">
			<div class="col-sm-6">
				<form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="mb-4">
						<img class="img-profile rounded-circle" src="{{ $user->avatar }}" height="80" width="80">
					</div>
					<div class="form-group">
						<input type="file" class="form-control-file" name="avatar">
					</div>
					<div class="form-group">
						<label for="username">username</label>
						<input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">

						@error('username')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">

						@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">

						@error('email')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="password_confirmation">Confirm Password</label>
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Update Profile</button>
				</form>
			</div>
		</div>
	@if( auth()->user()->userHasRole('admin') )
		<div class="row">
			<div class="col-md-8">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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
										<th>Attach</th>
										<th>Detach</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Option</th>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Attach</th>
										<th>Detach</th>
									</tr>
								</tfoot>
								<tbody>
								@foreach( $roles as $role )
									<tr>
										<td>
											<input type="checkbox" 
											@foreach($user->roles as $user_role) 
												@if($user_role->slug == $role->slug)
													checked
												@endif
											@endforeach>
										</td>
										<td>{{ $role->id }}</td>
										<td>{{ $role->name }}</td>
										<td>{{ $role->slug }}</td>
										<td>
											<form action="{{ route('role.attach', $user) }}" method="post">
												@csrf
												@method('PUT')
												<input type="hidden" name="role" value="{{ $role->id }}">
												<button class="btn btn-primary" type="submit"
												@if($user->roles->contains($role))
													disabled
												@endif
												>Attach</button>
											</form>
										</td>
										<td>
											<form action="{{ route('role.detach', $user) }}" method="post">
												@csrf
												@method('PUT')
												<input type="hidden" name="role" value="{{ $role->id }}">
												<button class="btn btn-danger" type="submit"
												@if(!$user->roles->contains($role))
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