@extends('layouts.app')

@section('content')

<!-- Include the listing model from server code -->
<script type="text/javascript">
	window.vuebnb_listing_model = "{!! addslashes(json_encode($model)) !!}";
</script>


<!-- Start designing with HTML -->
<div id="toolbar" >
	<div class="container">
		<img class="icon" src="{{ asset('images/logo.png') }}">
<a href=".">
	<h1>vuebnb</h1>
</a>
	</div>
</div>

<div id="app">
	<!-- Mount element -->
	<div class="header">
		<div class="header-img" v-bind:style="data.headerImageStyle" v-on:click="data.modalOpen=true">
			<button class="view-photos">View Photos</button>
		</div>
	</div>

	<div class="about">
		<div class="container">
			<div class="heading">
				<h1>@{{ data.title }}</h1>
				<p>@{{ data.address }}</p>
			</div>
		</div>

		<div class="divider"></div>
		<div class="container">
			<h3>About this listing</h3>
			<p v-bind:class="{contracted: data.contracted}">@{{data.about}}</p>
			<button class="more" v-on:click="data.contracted=false" v-if="data.contracted">+ Expand</button>
			<button class="more" v-on:click="data.contracted=true" v-else>- Contract</button>
		</div>
	</div>
	<div class="divider"></div>
	<div class="container">
		<div class="lists">
			<div class="amenities list">
				<div class="title"><strong>Amenities</strong></div>
				<div class="content">
					<div class="list-item" v-for="amenity in data.amenities">
						<span v-bind:class="{slash: !amenity.value}">
							<i class="fa fa-lg " v-bind:class="amenity.icon"></i>&nbsp;@{{amenity.title}}
						</span>
					</div>
				</div>
			</div>

			<div class="prices list">
				<div class="title"><strong>Prices</strong></div>
				<div class="content">
					<div class="list-item" v-for="price in data.prices">
						@{{price.title}}: <strong>@{{price.value}}</strong>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- The modal  -->
	<div id="modal" v-bind:class="{show: data.modalOpen}">
		<button v-on:click="data.modalOpen = false" class="modal-close">
			&times;
		</button>
		<div class="modal-content">
			<img v-bind:src="data.headerImageLink" alt="Header Image">
		</div>
	</div>
</div>

@endsection
