<x-admin-master>
	@section('content')
		<div class="row">
			<div class="col-sm-3">
				<form action="{{ route('permission.update', $permission) }}" method="post">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $permission->name }}" name="name">
					</div>
				@error('name')
					<p class="text-danger">{{ $message }}</p>
				@enderror
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>

	@endsection
</x-admin-master>