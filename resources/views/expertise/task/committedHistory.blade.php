@extends('expertise.main')

	@section('header')

	
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/select2.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/select2-bootstrap.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/datepicker.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/jquery.minicolors.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("css/expertise/vendor/summernote.css")}} >


	<!-- javascript -->
	
	<script src={{asset("js/expertise/vendor/select2.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/bootstrap-datepicker.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.validate.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/summernote.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.raty.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.minicolors.min.js")}}></script>
	<script src={{asset("js/expertise/vendor/jquery.maskedinput.js")}}></script>

	@stop

	@section('content')
				<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Github

					<small class="hidden-xs">
						<a href="{!! URL::route('expertise.task.githubEdit', $tasks->id)!!}" class="btn btn-default"><strong>Go Back</strong></a>
					</small>
				</div>
			</div>

			       @if (count($errors) > 0)
                                <div class="alert alert-danger" style = "background-color:transparent">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

			<div class="content-wrapper">
				<div class="panel-body table-responsive">					                    										
					<table class="table table-striped" id="data-tables">
					  <thead>
							<tr>
								<th class="col1">No</th>
								<th class="col2">Commit Comment</th>
								<th class="col3">Committed Time</th>
							</tr>
					  </thead>
					  <tbody>
						  @foreach ($github_hitorys as $key => $github_hitory)
							<tr>
								<td class="odd gradeX">{{ $key + 1 }}</td>
								<td class="odd gradeX">{{ $github_hitory->commit_comment }}</td>
								<td class="odd gradeX">{{ $github_hitory->updated_at }}</td>
							</tr>
						 @endforeach
					  </tbody>
					</table>
				</div>
			</div>
	<script src="{!! url('marked.min.js') !!}"></script>
		<script src="{!! url('vue.js') !!}"></script>

		<script type="text/javascript">
		$(function () {

			// Form validation
			$('#new-task').validate({
				rules: {
					"task[title]": {
						required: true
					},
					"task[notes]": {
						required: true
					}
				},
				highlight: function (element) {
					$(element).closest('.form-group').removeClass('success').addClass('error');
				},
				success: function (element) {
					element.addClass('valid').closest('.form-group').removeClass('error').addClass('success');
				}
			});

			// Task tags and Developers with select2
			$("#task-tags").select2({
				placeholder: 'Select tags or add new ones',
				tags:["shirt", "gloves", "socks", "sweater"],
				tokenSeparators: [",", " "]
			});


			$("#task-developers").select2({
				placeholder: 'Select developers or add new ones',
				tags:["John Joe", "Dove Doe", "Xon Xee", "Jhana Panka"],
				tokenSeparators: [",", " "]
			});

			// Bootstrap wysiwyg
			$("#summernote").summernote({
				height: 240,
				toolbar: [
				    ['style', ['style']],
				    ['style', ['bold', 'italic', 'underline', 'clear']],
				    ['fontsize', ['fontsize']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']],
				    ['insert', ['picture', 'link', 'video']],
				    ['view', ['fullscreen', 'codeview']],
				    ['table', ['table']],
				]
			});



			// $("#summernote").on("summernote.change", function (e) {   // callback as jquery custom event
			// 	console.log('it is changed');
			// 	var input = $("#inputText");
			// 	input.val($('#summernote').summernote('code'));
			// 	input.trigger("change");
			// });
			// $('#summernote').summernote('code', $("#inputText").val());
			// console.log($("#inputText").val());

			$( "body" ).click(function() {
				console.log("here")
				if($("body").hasClass("modal-open")){
  					$("body").removeClass("modal-open")
  				}
			});

			$("#summernote2").summernote({
				height: 240,
				toolbar: [
				    ['style', ['style']],
				    ['style', ['bold', 'italic', 'underline', 'clear']],
				    ['fontsize', ['fontsize']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']],
				    ['insert', ['picture', 'link', 'video']],
				    ['view', ['fullscreen', 'codeview']],
				    ['table', ['table']],
				]
			});
			// jQuery rating
			$('#raty').raty({
				path: 'img/raty',
				score: 4
			});

			// Datepicker
	        $('.datepicker').datepicker({
	        	autoclose: true,
	        	orientation: 'left bottom',
	        });

	        // Minicolors colorpicker
	        $('input.minicolors').minicolors({
	        	position: 'top left',
	        	defaultValue: '#9b86d1',
	        	theme: 'bootstrap'
	        });

	        // masked input example using phone input
			$(".mask-phone").mask("(999) 999-9999");
			$(".mask-cc").mask("9999 9999 9999 9999");
		});
	</script>
@endsection