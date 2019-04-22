@extends('layouts.app')

@section ('content')
<div id="app">
	<div class="container">
		<h1>HomePage</h1>
		<div class="">
			<ul class="list">
				<li class="list-item">
					<a href="{{ route('listing.index') }}">View all listings</a>
				</li>
				<li class="list-item">
					<a href="" class="btn btn-primary">Login</a>
					<a href="" class="btn btn-secondary">Register</a>
				</li>
			</ul>



		</div>
	</div>
</div>
@endsection
