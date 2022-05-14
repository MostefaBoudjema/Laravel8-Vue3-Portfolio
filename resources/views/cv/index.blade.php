@extends('layouts.app')
@section('content')
<cv></cv>
@endsection

@section('javascripts')
<script>
	window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
		// 'idCV' => $id,
		'url'		=>url('/')
	]) !!};
</script>
<script src="/assets/js/sweetalert2.js"></script>
@endsection