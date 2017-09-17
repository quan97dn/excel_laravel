@extends('templates.templates')
@section('title')
  Create User
@endsection
@section('content')
  <div class="col-sm-12 vert-offset-top-1">
      <div class="col-md-6">
        <div class="panel panel-default panel-table ">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">CREATE USER</h3>
              </div>
              <div class="col col-xs-6 text-right">
                {{ Html::link('#', null, array('class' => 'btn btn-sm btn-info btn-save')) }}

                {{ Html::link('#', null, array('class' => 'btn btn-sm btn-warning btn-reset')) }}
              </div>
            </div>
          </div>
          <div class="panel-body">
              <div class="col-sm-12 vert-offset-top-1 vert-offset-bottom-1" >
                  {!! Form::open(['url' => url('admin/users/PostCreate'), 'id' => 'frmCreate', 'method' => 'post', 'files'=> true]) !!}    
                  <div class="form-group">
                      <div class="col-sm-6">
                          <label for="firstname">First name</label>
                          {{ Form::text('f_name', null, ['id' => 'firstname', 'class'=>'form-control', 'title'=>'Please enter your firstname', 'placeholder'=>'Firstname']) }}
                      </div>
                      <div class="col-sm-6">
                          <label for="lastname">Last name</label>
                          {!! Form::text('l_name', null, ['id' => 'lastname', 'class' => 'form-control', 'title' => 'Please enter your lastname', 'placeholder' => 'Lastname']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="username">Username</label>
                      {!! Form::text('username', null, ['id' => 'username', 'class'=>'form-control', 'title'=>'Please enter your username', 'placeholder'=>'username']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="email">Email</label>
                      {!! Form::email('email', null, ['id' => 'email', 'class'=>'form-control', 'title'=>'Please enter your email', 'placeholder'=>'Enter email']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="password">Password</label>
                      {!! Form::input('password', 'password', null, ['id' => 'password', 'class' => 'form-control', 'title'=>'Please enter your password', 'placeholder'=>'Password']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="password_confirmation">Repeat password</label>
                      {!! Form::input('password', 'password_confirmation', null, ['id' => 'password_confirmation', 'class' => 'form-control', 'title'=>'Please enter your Repeat password', 'placeholder'=>'Repeat password']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="level">Level</label>
                      {!! Form::select('level', ['0' => 'Admin', '1' => 'Member'], null, ['class' => 'form-control']) !!}
                    </div>
                  </div>
                 <div class="form-group">
                      <div class="col-sm-12">
                        <label for="image">Image</label>
                        <td>
                            {!! Form::file('fileImage', ['id' => 'fileImage','class' => 'form-control']) !!}
                        </td>   
                      </div>
                  </div>
                  {!! Form::submit(null, ['id' => 'btnSubmit', 'style' => 'display:none;']) !!}
                  {!! Form::reset(null, ['id' => 'btnReset', 'style' => 'display:none;']) !!}
                  {!! Form::close() !!}
              </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col col-xs-4">
                  {{ Html::link('/admin/users', 'Back', array('class' => 'btn btn-success btn-back ')) }}
              </div>
            </div>
          </div>
        </div>
      </div>
      @if(Session::has('fcreate'))
        <div class="alert alert-success" >
          {{ Session::get('fcreate') }}
        </div>
      @endif
      @include('block.error')
    </div>
  </div>
@endsection