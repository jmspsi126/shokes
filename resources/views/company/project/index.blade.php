@extends('company.main')
	@section('body')
		<div class="container-fluid menu-hidden">
			@include('company.sidebar')
			<div id="content">
				@include('company.header')
				<div class="col-table-row">
					<div class="col-app col-unscrollable">
						<div class="col-app">
							<div class="col-table">
								<div class="col-separator-h box"></div>	
								<div>   
	                                @if ($errors -> has())
	                                    <div class="alert alert-danger alert-dismissibl fade in">
	                                        <button type="button" class="close" data-dismiss="alert">
	                                            <span aria-hidden="true">&times;</span>
	                                            <span class="sr-only">Close</span>
	                                        </button>
	                                        @foreach ($errors -> all() as $error)
	                                            <p>{{ $error }}</p>		
	                                        @endforeach
	                                    </div>
	                                @endif 
	            			        
	                                @if (isset($alert)) 
	                                    <div class="alert alert-{!! $alert['type'] !!} alert-dismissibl fade in">
	                                        <button type="button" class="close" data-dismiss="alert">
	                                            <span aria-hidden="true">&times;</span>
	                                                <span class="sr-only">Close</span>
	                                        </button>
	                                        <p>
	                                            {!! $alert['msg'] !!}
	                                        </p>
	                                    </div>
	                                @endif 
	                            </div>
								<div class="col-table-row">
									<div class="row-app">
										<div class="col-md-12">
											<div class="col-separator box bg-gray">
												@foreach($projects as $project)
												<div class = "col-md-3 col-md-offset-1" style = "margin-left:5%;background-color:white;margin-top: 5%;height:300px;text-align:center;border-radius: 10px;padding:20px">


													<img src="{{url('/img/web-development.png')}}" style = "margin-top:10%;opacity:0.85;width: 30%;size: 20px;">

													<h3 style = "
														font-size: 20px;
														font-weight: 400;
														margin-top: 8%;
														color:#374a59;
													">Editing Project</h3>

													<p style = "
														color: #bfc2c7;
														text-overflow: ellipsis;
														height: 40px;
														overflow: auto;
															">Change the desciprtion of the project so the expertise could better understand your requirement</p>
													<div class = "col-md-6 col-md-offset-3">
														<a href="{!! URL::route('project.view', $project['id']) !!}"<h3 style = "
														font-size: 20px;
														font-weight: 400;
														margin-top: 8%;
														color:#374a59;
													"><button type="button" class="btn btn-default">Update</button></a>
													</div>


													<!-- // Table END -->
													<!-- Pagination -->
													<div class="row">
														{!! $projects->render() !!}
													</div>
													<div class="clearfix"></div>
													<!-- // Pagination END -->
												</div>


													<div class = "col-md-3 col-md-offset-1" style = "background-color:white;margin-top: 5%;height:300px;text-align:center;border-radius: 10px;padding:20px">

													<img src="{{url('/img/web-development.png')}}" style = "margin-top:10%;opacity:0.85;width: 30%;size: 20px;">

													<h3 style = "
													font-size: 20px;
													font-weight: 400;
													margin-top: 8%;
													color:#374a59;
												">Review Applications</h3>

													<p style = "
													color: #bfc2c7;
													text-overflow: ellipsis;
													height: 40px;
													overflow: auto;
														">{{ $project->description }}</p>
													<div class = "col-md-6 col-md-offset-3">
														<button type="button" class="btn btn-default">Edit Project</button>
													</div>


													<!-- // Table END -->
													<!-- Pagination -->
													<div class="row">
														{!! $projects->render() !!}
													</div>
													<div class="clearfix"></div>
													<!-- // Pagination END -->
												</div>


													<div class = "col-md-3 col-md-offset-1" style = "background-color:white;margin-top: 5%;height:300px;text-align:center;border-radius: 10px;padding:20px">

														<img src="{{url('/img/web-development.png')}}" style = "margin-top:10%;opacity:0.85;width: 30%;size: 20px;">

														<h3 style = "
													font-size: 20px;
													font-weight: 400;
													margin-top: 8%;
													color:#374a59;
												">Agreement</h3>

														<p style = "
													color: #bfc2c7;
													text-overflow: ellipsis;
													height: 40px;
													overflow: auto;
														">Start to editing the agreement and start the project</p>
														<div class = "col-md-6 col-md-offset-3">
															<button type="button" class="btn btn-default">Revising</button>
														</div>


														<!-- // Table END -->
														<!-- Pagination -->
														<div class="row">
															{!! $projects->render() !!}
														</div>
														<div class="clearfix"></div>
														<!-- // Pagination END -->
													</div>

													<div class = "col-md-3 col-md-offset-1" style = "margin-left:5%;background-color:white;margin-top: 5%;height:300px;text-align:center;border-radius: 10px;padding:20px">

														<img src="{{url('/img/web-development.png')}}" style = "margin-top:10%;opacity:0.85;width: 30%;size: 20px;">

														<h3 style = "
													font-size: 20px;
													font-weight: 400;
													margin-top: 8%;
													color:#374a59;
												">Tasks</h3>

														<p style = "
													color: #bfc2c7;
													text-overflow: ellipsis;
													height: 40px;
													overflow: auto;
														">Start to editing the agreement and start the project</p>
														<div class = "col-md-6 col-md-offset-3">
															<button type="button" class="btn btn-default">Revising</button>
														</div>


														<!-- // Table END -->
														<!-- Pagination -->
														<div class="row">
															{!! $projects->render() !!}
														</div>
														<div class="clearfix"></div>
														<!-- // Pagination END -->
													</div>

													<div class = "col-md-3 col-md-offset-1" style = "background-color:white;margin-top: 5%;height:300px;text-align:center;border-radius: 10px;padding:20px">

														<img src="{{url('/img/web-development.png')}}" style = "margin-top:10%;opacity:0.85;width: 30%;size: 20px;">

														<h3 style = "
													font-size: 20px;
													font-weight: 400;
													margin-top: 8%;
													color:#374a59;
												">Expertise</h3>

														<p style = "
													color: #bfc2c7;
													text-overflow: ellipsis;
													height: 40px;
													overflow: auto;
														">Start to editing the agreement and start the project</p>
														<div class = "col-md-6 col-md-offset-3">
															<button type="button" class="btn btn-default">Revising</button>
														</div>


														<!-- // Table END -->
														<!-- Pagination -->
														<div class="row">
															{!! $projects->render() !!}
														</div>
														<div class="clearfix"></div>
														<!-- // Pagination END -->
													</div>

													<div class = "col-md-3 col-md-offset-1" style = "background-color:white;margin-top: 5%;height:300px;text-align:center;border-radius: 10px;padding:20px">

														<img src="{{url('/img/web-development.png')}}" style = "margin-top:10%;opacity:0.85;width: 30%;size: 20px;">

														<h3 style = "
													font-size: 20px;
													font-weight: 400;
													margin-top: 8%;
													color:#374a59;
												">Git Management</h3>

														<p style = "
													color: #bfc2c7;
													text-overflow: ellipsis;
													height: 40px;
													overflow: auto;
														">Start to editing the agreement and start the project</p>
														<div class = "col-md-6 col-md-offset-3">
															<button type="button" class="btn btn-default">Revising</button>
														</div>


														<!-- // Table END -->
														<!-- Pagination -->
														<div class="row">
															{!! $projects->render() !!}
														</div>
														<div class="clearfix"></div>
														<!-- // Pagination END -->
													</div>

												@endforeach


												<div class="col-separator-h box"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@stop
	
	@section ('scripts') 
        <script type="text/javascript">
            function deleteProject(obj) {
                bootbox.confirm('Are you sure?', function(result) {
                    if (result) {
                        location.href=$(obj).attr('data-url');
                    }
                });    
            }
        </script>
    @stop
    
@stop
