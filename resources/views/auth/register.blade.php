@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Employee</a></li>
                      <li><a data-toggle="tab" href="#menu1">Company</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        {!! Form::open(['route'=>['signup.store', 'user'], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', "First Name", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('first_name') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', "Last Name", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('last_name') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', "Email", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', "Password", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', "Password Confirm", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-5">
                                {!! Form::submit('Register', ['class'=>'btn btn-block btn-primary']) !!}
                            </div>
                            <div class="clear"></div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    
                      <div id="menu1" class="tab-pane fade">
                        {!! Form::open(['route'=>['signup.store', 'admin'], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', "Administrator Name", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('first_name') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', "Company Name", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('last_name') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', "Company E-mail Address", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', "Password", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', "Password Confirm", ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-5">
                                {!! Form::submit('Register', ['class'=>'btn btn-block btn-success']) !!}
                            </div>
                            <div class="clear"></div>
                        </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
