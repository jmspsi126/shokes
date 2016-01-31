@extends('app')

@section('content')

	<div class="row">
		<div class="col-md-12" style = "text-align:center" >

			<img src="{{asset('img/lock.png')}}" style = "opacity:0.6;margin-top:2%">
			<h3> Your resume is not built yet, start working on some project now!</h3>
				<a href = "{{url('/project')}}">
			<button class="btn btn-default btn-lg" style = "margin-top:1%">Looking for project</button>
			</a>

		</div>
	</div>	
@endsection

