@extends('auth.register')

<link href="{{ asset('css/register.css') }}" rel="stylesheet">


@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name = "state" value = "student">


        <div class="form-group col-md-12 form">
            <label class="col-md-1 control-label lab">
                <span class = "glyphicon glyphicon-user"></span>
            </label>
            <div class="col-md-10 col-md-offset-1">
                <input class = "inp" type="text" name="name" value="my name">
            </div>
        </div>

        <div class="form-group col-md-12 form">
            <label class="col-md-1 control-label lab">
                <span class = "glyphicon glyphicon-envelope"></span>
            </label>
            <div class="col-md-10 col-md-offset-1">
                <input class = "inp" type="email" name="email" value="email@host.com">
            </div>
        </div>

        <div class="form-group col-md-12 form">
            <label class="col-md-1 control-label lab">
                <span class = "glyphicon glyphicon-pencil"></span>
            </label>
            <div class="col-md-10 col-md-offset-1">
                <input class = "inp" type="password" name="password" value="password">
            </div>
        </div>


        <div class="form-group col-md-12 form">
            <label class="col-md-1 control-label lab">
                <span class = "glyphicon glyphicon-pencil"></span>
            </label>
            <div class="col-md-10 col-md-offset-1">
                <input class = "inp" type="password" name="password_confirmation" value="password">
            </div>
        </div>

        <div class="form-group col-md-12 form">
            <label class="col-md-1 control-label lab">
                <span class = "glyphicon glyphicon-check"></span>
            </label>

            <div class="col-md-10 col-md-offset-1">
                <select class = "inp" type="text" multiple = "multiple" id = "skill_list" class="form-control" name="skill" placeholder="What you want to working on">
                    <option value = "FrontEnd">web development</option>
                    <option value = "FrontEnd">Frontend development</option>
                    <option value = "machine learning">Machine Learning</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary bt">
                    Register >
                </button>
            </div>
        </div>

    </form>
@endsection