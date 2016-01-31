@extends('company.main')
@section('body')
	<link href="{{ asset('css/resume.css') }}" rel="stylesheet">

	<div class="container-fluid menu-hidden">
		@include('company.sidebar')
		<div id="content">
			@include('company.header')
			<div class="innerLR" style = "padding-left:5%">
				<div class="separator"></div>
				<div class="lead center innerTB">

				<div class="row col-offset-2" >
					<div class="grid">
					@foreach ($tasks as $key => $task)
							<div class="grid-item">
								<div class="grid-item-content">
									<h3 style = "padding-top:15%;font-weight:300;height:70px;overflow:auto">{{ $task->name }}</h3>
									<h5 style = margin-bottom:5%>Expire on 5 days</h5>

									<div class = "col-md-1 col-md-offset-3">
										<span class = "glyphicon glyphicon-align-center" style = font-size:0.7em;color:grey></span>

									</div>

									<div class = "col-md-5" style = "margin-top:5%">

										<h5 style = font-weight:300;color:grey>Progress</h5>
									</div>
									<div class = "bar col-md-8 bar-space col-md-offset-2">
										<span class = "bar-unfill" style ="width:100%">
												<span class = "bar-fill" style = "height:20%">
											</span>
										</span>

										<h5 style = "font-weight: 300">75% of the task is completed</h5>
									</div>

								</div>

								<div class="grid-item-content hide">
									<h2 style = "padding-top:10%;font-weight:300;">{{ $task->name }}</h2>
									<h5 style = "margin-top:2%">Expire on 5 days</h5>
									<div class = "col-md-6 col-md-offset-3">
										<span class = "glyphicon glyphicon-check"></span><h4>Task completed</h4>
									</div>
									<h4>Tasks on progress</h4>
									<p>
									</p>

								</div>


							</div>


					@endforeach

				</div>
			</div>
		</div>
	</div>
@stop


@section ('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js"></script>

	<script type="text/javascript">
		function deleteTask(obj) {
			bootbox.confirm('Are you sure?', function(result) {
				if (result) {
					location.href=$(obj).attr('data-url');
				}
			});
		}

		$(document).ready(function() {

			$('.blog').click(function(){
				$(this).find("div.detail").toggleClass("show");
				$(this).find("div.detail_right").toggleClass("show");
			});

		});


		// external js: masonry.pkgd.js

		$(document).ready( function() {

			var $grid = $('.grid').masonry({
				columnWidth: 120,
				itemSelector: '.grid-item'
			});

			$grid.on( 'click', '.grid-item-content', function() {
				$( this ).parent('.grid-item').toggleClass('is-expanded');
				$( this).toggleClass('hide');
				$( this).siblings().toggleClass('hide');
				$grid.masonry();
			});

		});


	</script>
@stop
@stop
