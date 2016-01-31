<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Showcase</title>

	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300' rel='stylesheet' type='text/css'>


	<link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">
	<link href="{{ asset('css/register.css') }}" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" rel="stylesheet" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>


</head>

	<body>


		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 left-panel" style = "height:100%">
					<div class = "bg" style = "height:100%"></div>

					<div class = "info">
						<h1 class = "line-space">
							Start your joinery in our network<br>
							and matching by Artificial-</br>
							Intelligence to</br>
						</h1>
						<form class="form-horizontal" id = "form1" role="form" method="POST" action="{{ url('/auth/register') }}">
							<select name="state" onchange="window.location=this.value;" class="form-control sel" style="width:50%;margin-top:5%" >
								<option id="company" value={{url('auth/register/company')}}>Start my project</option>
								<option id ="student" value="{{url('auth/register/student')}}">Become top talent</option>
							</select>
						</form>
					</div>

					<div style = "position:absolute;bottom:22%;left:200px;color:#ECA612; ">
						<footer style="display:inline-flex;width:300px">
							<P>Term of use</P>
							<P style = margin-left:20px>Impact</P>
							<P style = "margin-left:20px">More about us</P>
						</footer>
					</div>
				</div>

				<div class =  "col-md-4 right-panel" style = "height:100%">
					<div class = "content">
						<h3 style = "line-height:1.2">
							Sign up to experience how the technology changes cooperation
						</h3>
					</div>

					<div id = "pjax-container" class = "col-md-12">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						@yield('content')
					</div>

				</div>

				<script>
					$('#skill_list').select2({
						placeholder:'What you want to working on',
						tags:true
					});
				</script>
				<script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.js"></script>
				<script>
					$(document).pjax('a','#pjax-container')
				</script>

				<script>
						document.getElementById('{!! $pram !!}').selected = "true";
				</script>

				</div>

			</div>
		</div>


	</body>
</html>



