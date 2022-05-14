@extends('layouts.app')
@section('content')
<div class="container" >
	<div class="row">
		<div class="col-md-12">
			{{-- <h1 class=text-center v-for="el in experiences">Le CV de : @{{el.cvtitre}}</h1> --}}
			{{-- <h1 class=text-center v-for="(val, index) in experiences">Le CV @{{index}} de : @{{val.cvtitre}}</h1> --}}
			<h2 class=text-center>Titre</h1>
			{{-- <h1>@{{experiences}}</h1> --}}				
			<experience></experience>
			<hr>
			<formation></formation>
			<hr>
			<portefolio></portefolio>
			<hr>
			<competance></competance>			  
		</div>
	</div>
</div>
@endsection
@section('javascripts')
<script>
	window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
		'idCV' => $id,
		'url'		=>url('/')
	]) !!};
</script>
<script src="/assets/js/sweetalert2.js"></script>    
@endsection