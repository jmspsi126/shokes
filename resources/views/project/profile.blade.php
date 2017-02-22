<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Shokse client project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/favicon-icon.png" sizes="16x16">
	<!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--font-awesome CSS-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--Custom Template CSS-->
    <!-- <link href="css/main.css" rel="stylesheet" type="text/css"> -->
    <link href="css/main-extended.css" rel="stylesheet" type="text/css">
    <!--Media Query CSS-->
    <link href="css/media-query-all.css" rel="stylesheet" type="text/css">
    <!--slick CSS-->
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" href="css/profile/fileinput.css">
    <link rel="stylesheet" href="css/profile/style.css">
  </head>
  <body>
    <header class="shokse-header block logged_header">
    	<nav class="navbar container">
          <figure class="row">
            <figcaption class="navbar-header pull-left">
              <a class="navbar-brand" href="#"><img src="images/shokse-logo.png" class="img-responsive" alt="logo"/></a>
              <button type="button" class="navbar-toggle mobile-nav" data-toggle="collapse" data-target="#mobileMenuCollapsing">
                 <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </figcaption>
            <!-- /.navbar-header -->
            <!--<figcaption class="nav-menu-right pull-right">
                <figcaption id="mobileMenuCollapsing" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav main-menu">
                    	<li><button type="button" class="btn">Get Started</button></li>
                        <li class="get-started"><a href="#" class="search"></a></li>
                    </ul>
                </figcaption>
            	<!-- /.collapse.navbar-collapse -->

            <!--</figcaption>-->
            <figcaption class="search_cover navbar-collapse">
              <ul class="user_account">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Account setting</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                  </ul>
                </li>
              </ul>

              <a href="#" class="notifications user_icons">
              	<i class="fa fa-bell" aria-hidden="true"></i>
                <span class="badge bg-success">5</span>
              </a>
              <div class="dropdown user_icons">
                <a class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" href="#"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></a>
                <div class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <div class="succes gray arrow_box">
                    <div class="dropdown-square">
                      <span>4</span>
                      <span class="small">LEVEL</span>
                    </div>
                    <div class="success">
                      <span class="bold"> Well done! </span>
                      As of this month you are a Level 4 PHP developer
                    </div>
                    <span class="big_number"> 82%</span>
                    <span> TILL THE NEXT LEVEL </span>
                  </div>
                  <div class="purple_div inside_triangle">
                    PAST TASKS
                  </div>
                  @foreach($completed_tasks as $index => $item)                    
                    <div class="single_task_div purple_div {{$index == 0 ? 'first_task' : ''}}">
                      <span class="time"> 3 minutes ago</span>
                      <span class="compl_task task"> TASK COMPLETED </span>
                      <span class="bold"> {{$item->name}} </span>
                      <span> {{$item->description}} </span>
                    </div>                                                                
                  @endforeach
                </div>
              </div>
              <a href="#" class="menu_1">
              	<span></span>
                <span class="mid"></span>
                <span></span>
              </a>
            </figcaption>
            <!-- /.nav-right -->

          </figure>
          <!-- /row -->
		</nav>
        <!-- /.container -->
    </header>
    <!-- /.shokse-header -->
  	<main class="block">
        <section class="block duis-quis tasks_page">
        	<article class="container">
          	<figure>
                  <h1 class="text-center thin-heading">My tasks</h1>
                  <h6 class="text-center deco1">SUBHEADLINE</h6>
            </figure>
          </article>
    		<!-- /.container -->
        </section>
    	<!-- /.duis-quis -->
        <section class="block tasks_body">
        	<article class="container">
            	<div class="mid_back">
                	<div class="mid_back_in	">
                    	<div class="count_round">
                            {{count($task)}}
                        </div>
                       <div class="clearfix"></div>
                    	<span>TASKS</span>
                        <div class="clearfix"></div>
                        <ul>
                        	<li><div class="filter_pic"></div>Filter:</li>
                            <li><a href="#">All</a></li>
                            <li><a href="#">Newest</a></li>
                            <li><a href="#">Completed</a></li>
                            <li><a href="#">Not completed</a></li>
                        </ul>
                        <div class=" clearfix"></div>
                        <div class=" commit_container">
                          <div class="f1_container">
                              <div class="shadow f1_card">
                                  <div class="front face">
                                      <a href="javascript:;" class="btn2">COMMIT PROJECT</a>
                                  </div>                  
                                  <div class="back face center">
                                    @if($task->isCommited==1)
                                      <h2>Waiting for Approval...</h2>                                      
                                        <button class="btn btn_wid" type="submit" disabled>Submit</button> 
                                    @else
                                    {!! Form::open(array('url'=>'/project/update','method'=>'POST', 'files'=>true)) !!}
                                        <h2>Upload File</h2>
                                        <div class="file_upload">
                                            <div class="form-group notactive">
                                                {!!Form::label('')!!}
                                                {!!Form::file('zip',array('id'=>'file-3'))!!}
                                            </div>                            
                                        </div>
                                        <button class="btn btn_wid" type="submit">Submit</button> 
                                        {!! Form::close() !!}
                                    @endif
                                  </div>
                              </div>
                          </div>                        
                      </div>
                    </div>
                    <div class=" clearfix"></div>

                    <div class="mid_other1" id="open_{{$task->id}}">
                      <div class="mid_other_inner">
                      <div class="l_task">
                        <div class="date">DUE DATE: {{$task->pivot->created_at->modify($task->estimateTime ." days")->format('d/m/Y')}}</div>
                        <div class="clearfix"></div>
                          <div class="task_cover">
                              <div class="l_task_name">{{$task->name}}</div>
                          </div>
                          <div class="task-info">
                              <div class="date">ASSIGN DATE: {{$task->pivot->created_at->format('d/m/Y')}}</div>
                            <div class="project_manager">PROJECT MANAGER</div>
                            <div class="manager-name"> Jim James</div>
                          </div>
                        </div>
                        <div class="r_task">
                          <div class="r_tasks">{{date_diff($task->pivot->created_at->modify($task->estimateTime ." days"), date_create(date("M j, Y")))->format('%d')}}
                            <div class="clearfix"></div>
                              <span>DAYS</span>
                          </div>
                          <div class="r_tasks">{{date_diff($task->pivot->created_at->modify($task->estimateTime ." days"), date_create(date("M j, Y")))->format('%h')}}
                            <div class="clearfix"></div>
                              <span>HOURS</span>
                          </div>
                          <div class="r_time">
                            <div class="clearfix"></div>
                              <div class="time">TIME REMAIMING</div>
                          </div>
                        </div>
                        <div class="dot_icon" onClick="OpenHoverstate('{{$task->id}}')">
                        	<div id="wave">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                        </div>
                        <div class="dot_icon task_icon task_icon_2">
                        	<div id="icon" onClick="onWikiPage()">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="dot_icon task_icon task_icon_3 inactive">
                        	<div id="icon notif_icon">
                            <i class="fa fa-folder-o" aria-hidden="true"></i>
                            <span class="badge bg-success not_badge">5</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mid_back_in	content-wrapper">
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
                    	<form id="edit-task" action= "{!! URL::route('profile.githubCommitStore') !!}" class="form-horizontal" method="post" role="form">
							<input type = "hidden" name = "_token" id = "_token" value = "{{ csrf_token() }}">
							<input type="hidden" name="task_id" value="{!! $task->id !!}">
						  	<div class="form-group">
							    <label class="col-sm-4 col-md-6 control-label">Commit Comment</label>
							    <div class="col-sm-8 col-md-6">
							      <input type="input" class="form-control" name="commit_comment" value="" />
							    </div>
						  	</div>
						  	<div class="form-group">
							    <label class="col-sm-4 col-md-6 control-label">Git UserName</label>
							    <div class="col-sm-8 col-md-6">
							      <input type="input" class="form-control" name="git_name" value="" />
							    </div>
						  	</div>
						  	<div class="form-group">
							    <label class="col-sm-4 col-md-6 control-label">Git Password</label>
							    <div class="col-sm-8 col-md-6">
							      <input type="password" class="form-control" name="git_password" value="" />
							    </div>
						  	</div>
						  	<div class="form-group form-actions" style="padding-top: 30px;">
						    	<div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
						      		<button type="submit" class="btn btn-success" enabled>Ok</button>
					    		</div>
						  	</div>
						  </form>
                    </div>
                    <div class="mid_other1_sub" style="display:none; left:885px;" id="close_{{$task->id}}" >
                        <h2>{{$task->name}}</h2>
                        <div class="clearfix"></div>
                        <div class="date_white">DUE DATE: {{$task->pivot->created_at->modify($task->estimateTime ." days")->format('d/m/Y')}}</div>
                        <div class="clearfix"></div>
                        <div class="pic_cover">
                          <h3>Description</h3>
                          <p>{{$task->description}}</p>
                        </div>
                            <div class="close_icon" onClick="CloseHoverstate('{{$task->id}}')"> &nbsp;</div> 
                    </div>                    
                </div>
            </article>
    		<!-- /.container -->
        </section>
    </main>
  	<!-- /main -->



    <footer class="block shokse-footer">
    	<article class="container">
        	<figure class="shokse-footer-top col-md-16 col-sm-16 col-xs-16">
            	<figcaption class="col-md-8 col-sm-8 col-xs-16 footer-left">
                	<a href="#" class="footer-logo"><img src="images/shokse-footer-logo.png" alt="footer-img" /></a>
                    <p class="primary-color shokse-matche">Shokse matches the perfect candidate to your projects in need. No matter how complicated, the Shokse management system gets your project done faster and bettter.</p>
                </figcaption>
  				<!-- /figcaption col -->

                <figcaption class="col-md-8 col-sm-8 col-xs-16 footer-right">
                	<ul>
                    	<li>
                        	<h6>About us</h6>
                            <a href="#">Who We Are</a>
                        </li>
                        <li>
                        	<h6>Quick Links</h6>
                            <a href="#">Register</a>
                        </li>
                        <li>
                        	<h6>Supports</h6>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>

                </figcaption>
  				<!-- /figcaption col -->

            </figure>
  			<!-- /.footer-top -->

            <figure class="shokse-footer-bottom col-md-16 col-sm-16 col-xs-16">
                <figcaption class="col-md-8 col-sm-8 col-xs-16 social-link">
                	<a href="#"><img src="images/fb-icon.png" alt="icon" /></a>
                    <a href="#"><img src="images/twiter-icon.png" alt="icon" /></a>
                    <a href="#"><img src="images/link-in-icon.png" alt="icon" /></a>
                </figcaption>
  				<!-- /figcaption col -->

                <figcaption class="col-md-8 col-sm-8 col-xs-16 copyWrite">
                	<a href="#">© 2016 Shokse Ltd </a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </figcaption>
  				<!-- /figcaption col -->

            </figure>
  			<!-- /.footer-bottom -->

        </article>
  		<!-- /article -->
    </footer>
  	<!-- /footer.shokse-footer -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/iscroll.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script type="text/javascript">

	function OpenHoverstate(id) {
    jQuery("#open_"+id).hide();
		jQuery("#open_"+id).animate({"left":"810px"}, "slow");
		jQuery("#close_"+id).show();
		jQuery("#close_"+id).animate({"left":"0px"}, "slow");
	}

	function CloseHoverstate(id) {
    jQuery("#close_"+id).hide();
    jQuery("#close_"+id).animate({"left":"810px"}, "slow");
	  jQuery("#open_"+id).show();
		jQuery("#open_"+id).animate({"left":"0px"}, "slow");
	}

  function onWikiPage(){

    window.location.href="/{{$task->project_id}}/wiki";
  }
      jQuery('.f1_container .front a').click(function() {
            jQuery('.f1_container').toggleClass('active');
        });                  
    </script>
    <script>
        jQuery("#file-3").fileinput({
            showUpload: false,
            showCaption: false,
            maxFileSize: 10000,
            browseClass: "btn btn_upload",
            fileType: "any",
        });            

      jQuery(document).ready(
        function(){
            jQuery('button').attr('disabled',true);
            jQuery('input:file').change(
                function(){
                    if (jQuery(this).val()){
                        jQuery('button').removeAttr('disabled'); 
                    }
                    else {
                        jQuery('button').attr('disabled',true);
                    }
                });
        });
        
    </script>     

	</script>
  </body>
</html>
