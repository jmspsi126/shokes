@extends('app')
@section('content')

  <link href = "{{asset('css/projectlist.css') }}" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" rel="stylesheet" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>


  <script>
    console.log('here');
    $(document).ready(function() {
      $(".clickable").click(function(){
        if($(".clickable").hasClass("active")){
          $(".clickable").removeClass("active");
        }
        $(this).addClass("active")
      });
    });	</script>




  <div class="container-fluid">
    <div id="content">

      <div class = "col-md-12" style = "height:250px">
        <div class="col-md-4 col-md-offset-4 center" style = "text-align: center" >
          <h3 class = "title">REGISTER AN ACCOUNT</h3>
        </div>
      </div>

      <form class="form-horizontal" action="{!! URL::route('project.store') !!}" role="form" method="post">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

        <div class = "col-md-12">
          <div class = "col-md-1 col-md-offset-1">
            <h2 class = "numberCircle">1</h2>
          </div>

          <div class = "col-md-4" style = "margin-top:5px">
            <h3 class = "title">What is your personal information?</h3>
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-7">
            <input type="text" class="form-control input_" name="name" placeholder="Youremail@host.com" style = "box-shadow: none">
          </div>
        </div>

        <div class = "col-md-12">
          <div class = "col-md-1 col-md-offset-1">
            <h2 class = "numberCircle">2</h2>
          </div>

          <div class = "col-md-4" style = "margin-top:5px">
            <h3 class = "title">Please input your password</h3>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-7">
            <input type="password" class="form-control input_" name="name" placeholder="password" style = "box-shadow: none">
            <input type="password" class="form-control input_" name="name" placeholder="confirm your password" style = "box-shadow: none">

          </div>
        </div>
       </form>






      <div class = "col-md-12" style = "height:300px;">
        <div class="col-md-4 col-md-offset-4 center" style = "text-align: center;">
          <h3 class = "title">SELECT YOUR PROJECT CATEGORY</h3>
        </div>
      </div>

      <div class="widget-body">
        <div class="innerLR">
          <form class="form-horizontal" action="{!! URL::route('project.store') !!}" role="form" method="post">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

            <div class = "col-md-2"></div>

            <div class="col-md-2 space clickable" style ="margin-top:0">
              <img src = "{{asset('img/seo-monitoring.png')}}" style = "height:8em">
              <p>Machine Learning</p>
            </div>

            <div class="col-md-2 col-md-offset-1 space clickable" style ="margin-top:0">
              <img src = "{{asset('img/web-development.png')}}" style = "height:8em">
              <p>Andriod Development</p>
            </div>

            <div class="col-md-2 col-md-offset-1 space clickable" style ="margin-top:0"s>
              <img src = "{{asset('img/landing-page.png')}}" style = "height:8em">
              <p>Web Development</p>
            </div>

            <div class = "col-md-12">
              <div class = "col-md-1 col-md-offset-1">
                <h2 class = "numberCircle">1</h2>
              </div>

              <div class = "col-md-4" style = "margin-top:5px">
                <h3 class = "title">What is about your project about?</h3>
                <p style = "font-weight:700;color:grey"> Project name:</p>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-7 col-md-offset-2" style = "margin-left:18%;">
                <input type="text" class="form-control input_" name="name" placeholder="What you want us to do" style = "box-shadow: none">
              </div>
            </div>

            <div class = "col-md-12">
              <div class = "col-md-1 col-md-offset-1">
                <h2 class = "numberCircle">2</h2>
              </div>

              <div class = "col-md-4" style = "margin-top:5px">
                <h3 class = "title">Tells us more about your project?</h3>
                <p style = "font-weight:700;color:grey"> Skills needed:</p>
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-8 col-md-offset-2">

                <div class="col-sm-10">
                  <select class="input_" type="text" multiple = "multiple" id = "skill_list" class="form-control" name="skill" placeholder="select the skills">
                    <option disabled = "disabled" value = "FrontEnd">Frontend development</option>
                    <option value = "javascript">javascript</option>
                    <option value = "Node.js">Node.js</option>
                    <option value = "Python">Python</option>
                    <option value = "Css">Css</option>
                    <option disabled = "disabled" value = "FrontEnd">Frontend development</option>
                    <option value = "Mysql">Mysql</option>
                    <option value = "GoogleAnalytics">Analytics</option>
                    <option value = "MongoDB">MongoDB</option>
                  </select>
                </div>


                <div class="col-sm-10" style = "margin-top:5%">
                  <p style = "font-weight:700;color:grey">Please give us more information about your project</p>
                  <textarea  class = "input_" name="description" cols="95" rows="5" placeholder="Description"></textarea>
                </div>

              </div>
            </div>


            <div class = "col-md-12">
              <div class = "col-md-1 col-md-offset-1">
                <h2 class = "numberCircle">3</h2>
              </div>

              <div class = "col-md-4" style = "margin-top:5px">
                <h3 class = "title">Tells us about your project open period?</h3>
              </div>

              <div class="form-group">
                <div class = "col-md-10 col-md-offset-2" style = "margin-top:1%;margin-left:18%">
                  <p style = "font-weight:700;color:grey">Start Time</p>
                </div>
                <div class="col-md-3 col-md-offset-2" style = "margin-left:18%">
                  <input class = "input_" type="date" class="form-control" name="Start Time" placeholder="Estimate Time" style = "color:grey">

                </div>

                <div class = "col-md-10 col-md-offset-2" style = "margin-top:2%;margin-left:18%">
                  <p style = "font-weight:700;color:grey">Ending Time</p>
                </div>
                <div class="col-md-3 col-md-offset-2" style = "margin-left:18%">
                  <input class="input_" type="date" class="form-control" name="Ending time" placeholder="Estimate Time" style ="color:grey">
                </div>
              </div>
            </div>





            <div class = "col-md-12" style = "height:200px">
              <div class = "col-md-1 col-md-offset-1">
                <h2 class = "numberCircle">4</h2>
              </div>

              <div class = "col-md-4" style = "margin-top:5px">
                <h3 class = "title">Upload your code</h3>
                <p style = "font-weight:700;color:grey"> Upload Current Code</p>
              </div>

              <div class = "col-md-6" style = "height:150px"></div>

              <div class = "col-md-2 col-md-offset-2 upload">
                <h4 class = "title"><a>+ Upload File</a></h4>
              </div>

            </div>


            <div class="form-group">
              <div class ="col-md-12" style = "margin-top:3%;height:200px">
                <div class="col-sm-6 col-sm-offset-2">
                  <button type="submit" class="btn btn-lg btn-info">Post Your Project Now</button>
                  <a href="{!! URL::route('task') !!}" class="btn btn-lg btn-info pull-right margin-bottom-xs">Cancel</a>
                </div>
              </div>
            </div>

            <script>
              $('#skill_list').select2({
                placeholder:'Choose the talents',
                tags:true
              });
            </script>


          </form>
        </div>
      </div>
    </div>
  </div>


@endsection






