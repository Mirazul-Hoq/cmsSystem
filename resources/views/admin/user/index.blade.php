<x-admin-master>
	
	@section('content')
		<h1>Users</h1>

		@if(session('user-delete-message'))
			<div class="alert alert-danger">{{ session('user-delete-message') }}</div>
		@endif

		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>USERNAME</th>
								<th>AVATAR</th>
								<th>NAME</th>
								<th>EMAIL</th>
								<th>REGISTERED DATE</th>
								<th>PROFILE UPDATED</th>
								<th>DELETE</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>USERNAME</th>
								<th>AVATAR</th>
								<th>NAME</th>
								<th>EMAIL</th>
								<th>REGISTERED DATE</th>
								<th>PROFILE UPDATED</th>
								<th>DELETE</th>
							</tr>
						</tfoot>
						<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td><a href="{{ route('admin.user.profile', $user->id) }}">{{ $user->username }}</a></td>
								<td><img src="{{ $user->avatar }}" alt="user-image" height="50"></td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at->diffForHumans() }}</td>
								<td>{{ $user->updated_at->diffForHumans() }}</td>
								<td>
									<form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
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
	@endsection


	@section('scripts')
		<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

		<!-- Page level custom scripts -->
		<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
	@endsection

</x-admin-master>