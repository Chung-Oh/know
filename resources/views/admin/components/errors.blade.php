<div class="container col-md-6 justify-content-center pt-3">
	<ul class="list-group text-center font-weight-bold mb-0">
		@foreach ($errors->all() as $error)
			<li class="list-group-item list-group-item-danger">{{ $error }}</li>
		@endforeach
	</ul>
</div>