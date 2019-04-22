@extends('layouts.app')

@section ('content')
<script type="text/javascript">
	window.vuebnb_listing_model = "{!! addslashes(json_encode($model)) !!}";

</script>

<div id="app">
	<div class="container">
		<h1 class="page-header">All</h1>
		<div class="row">
			<div class="col-sm" v-for="datum in data">
				<div class="card" v-on:click="this.location = datum.url">
					<img class="card-img-top" :src="datum.headerImageLink" alt="Card image cap">
					<div class="card-body">
						<p class="card-title">
							<a :href="datum.url">
								@{{datum.title }} </a> </p> <p class="card-text">
									@{{data.about}}
						</p>

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
