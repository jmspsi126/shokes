@extends('main')
	@section('body')
		<div class="container-fluid menu-hidden main">
			@include('admin.sidebar')
			<div id="content">
				@include('header')

			</div>
		</div>
	@stop
	
	@section('custom-scripts')
		
	@stop
@stop
