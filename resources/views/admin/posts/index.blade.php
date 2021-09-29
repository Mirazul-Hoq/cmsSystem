<x-admin-master>
	
	@section('content')

		<h1 class="h3 mb-4 text-gray-800">View All post</h1>
	@if(session('message'))
		<div class="alert alert-danger">{{ session('message') }}</div>
	@elseif(session('create-post-message'))
		<div class="alert alert-success">{{ session('create-post-message') }}</div>
	@elseif(session('update-post-message'))
		<div class="alert alert-success">{{ session('update-post-message') }}</div>
	@endif
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Owner</th>
								<th>Title</th>
								<th>Content</th>
								<th>Photo</th>
								<th>Created At</th>
								<th>Updated At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
						<tr>
							<th>ID</th>
							<th>Owner</th>
							<th>Title</th>
							<th>Content</th>
							<th>Photo</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Action</th>
						</tr>
						</tfoot>
						<tbody>
						@foreach( $posts as $post )
							<tr>
								<td>{{ $post->id }}</td>
								<td>{{ $post->user->name }}</td>
								<td><a href="{{ route('admin.post.edit', $post->id) }}">{{ $post->title }}</a></td>
								<td>{{ $post->body }}</td>
								<td>
									<img src="{{ $post->post_image }}" alt="post-image" height="40">
								</td>
								<td>{{ $post->created_at->diffForHumans() }}</td>
								<td>{{ $post->updated_at->diffForHumans() }}</td>
								<td>
									<form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
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
				<div class="d-flex">
					<div class="mx-auto">{{ $posts->links() }}</div>
				</div>
				
			</div>
		</div>



	@endsection

	@section('scripts')
		<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

		<!-- Page level custom scripts -->
		<!-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> -->
	@endsection

</x-admin-master>