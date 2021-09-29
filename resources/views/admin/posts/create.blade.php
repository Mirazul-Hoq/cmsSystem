<x-admin-master>
	
	@section('content')

		<h1 class="h3 mb-4 text-gray-800">Create a post</h1>

		<div class="row">
			<div class="col-md-6">
				<form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
					</div>


					<div class="form-group">
						<textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
					</div>

					<div class="form-group">
						<label for="file">File</label>
						<input type="file" name="post_image" class="form-control-file" id="file">
					</div>
					<button type="submit" cursor="pointer" class="btn btn-primary">Submit</button>
				</form>

			</div>
		</div>

	@endsection

</x-admin-master>