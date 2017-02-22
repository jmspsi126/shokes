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
						<a href="https://github.com/" target="_blank" class="btn btn-default"><strong>Create Git Repository via Github</strong></a>
					</small>
					
					<small class="hidden-xs">
						<a href="{!! URL::route('expertise.task.committedHistory', $tasks->id)!!}" class="btn btn-default"><strong>View commited history</strong></a>
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
				<form id="edit-task" action= "{!! URL::route('expertise.task.githubStore') !!}" class="form-horizontal" method="post" role="form">
					<input type = "hidden" name = "_token" id = "_token" value = "{{ csrf_token() }}">
					<input type="hidden" name="task_id" value="{!! $tasks->id !!}">
					<input type="hidden" name="github_id" value="{!! $github[0]->id !!}">
					<input type="hidden" name="_method" value="post">

				  	<div class="form-group">
				  		<div class="col-sm-2"></div>
				  		<div class="col-sm-10 col-md-8">
					    	After create git repository, please add git repository.
					    </div>
				  	</div>
					<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Git Repository Url</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="input" class="form-control" name="git_repo" value="{!! $github[0]->git_repo !!}" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Repository File Name</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="input" class="form-control" name="file_name" value="{!! $github[0]->file_name !!}" />
					    </div>
				  	</div>
				  	<div class="form-group">
					    <label class="col-sm-2 col-md-2 control-label">Repository File Route</label>
					    <div class="col-sm-10 col-md-8">
					      <input type="input" class="form-control" name="file_route" value="{!! $github[0]->file_route !!}"/>
					    </div>
				  	</div>
				  	<div class="form-group form-actions">
				    	<div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
				    		<a href="{!! URL::route('expertise.view', $tasks->project_id)!!}" class="btn btn-default">Cancel</a>
				      		<button type="submit" class="btn btn-success">OK</button>
			    		</div>
				  	</div>
				</form>
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