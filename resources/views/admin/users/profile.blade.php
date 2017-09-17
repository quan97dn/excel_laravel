@extends('templates.templates')
@section('title')
	View User
@endsection
@section('content')
	<div class="col-sm-12 vert-offset-top-1">
      <div class="col-md-7">
        <div class="panel panel-default panel-table ">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">PROFILE USER</h3>
              </div>
              <div class="col col-xs-6 text-right">
                {{ Html::link('#', null, ['class' => 'btn btn-sm btn-info btn-update']) }}
                {{ Html::link('#', null, array('class' => 'btn btn-sm btn-warning btn-reset')) }}
              </div>
            </div>
          </div>
          <div class="panel-body">
              {!! Form::model($user, ['route' => ['users.setProfile', $user->id], 'id' => 'frmUpdate', 'method' => 'post', 'files'=> true]) !!}
              <div class="col-sm-12 vert-offset-top-1 vert-offset-bottom-1 " >
                 <div class="col-sm-7" >
                    <div class="col-sm-6">
                          <label for="firstname">First name</label>
                          {{ Form::text('f_name', null, ['id' => 'firstname', 'class'=>'form-control', 'title'=>'Please enter your firstname', 'placeholder'=>'Firstname']) }}
                    </div>
                    <div class="col-sm-6">
                        <label for="lastname">Last name</label>
                        {!! Form::text('l_name', null, ['id' => 'lastname', 'class' => 'form-control', 'title' => 'Please enter your lastname', 'placeholder' => 'Lastname']) !!}
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="username">Username</label>
                        {!! Form::text('username', null, ['id' => 'username', 'class'=>'form-control', 'title'=>'Please enter your username', 'placeholder'=>'username', 'readonly' => 'true']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="email">Email</label>
                        {!! Form::email('email', null, ['id' => 'email', 'class'=>'form-control', 'title'=>'Please enter your email', 'placeholder'=>'Enter email', 'readonly' => 'true']) !!}
                      </div>
                    </div>
                </div>
                 <div class="col-sm-5" >
                    <div class="form-group">
                      <div class="col-sm-12">
                          <label for="image">Avatar</label>
                          <br>
                          @if(!empty($user->image))
                              <div class="col-sm-12" style="padding:0; margin: 0;">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                     {!! Html::image($user->image, Null, ['class' => 'col-sm-11 img-thumbnail']) !!}
                                     {{ Form::hidden('fimage', $user->image) }}
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="{!! route('users.getDeleteImg', ['id' => $user->id]) !!}"><i class="fa fa-trash"></i> Delete </a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-ban"></i> Cancel </a></li>
                                  </ul>
                              </div>
                          @else
                               {!! Form::file('fileImage', ['id' => 'fileImage','class' => 'form-control']) !!}
                          @endif   
                      </div>
                    </div>
                 </div>
            </div>
            {!! Form::submit(null, ['id' => 'btnSubmit', 'style' => 'display:none;']) !!}
            {!! Form::reset(null, ['id' => 'btnReset', 'style' => 'display:none;']) !!}
            {!! Form::close() !!}
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col col-xs-4">
                  {{ Html::link('/admin/users', 'Back', ['class' => 'btn btn-success btn-back ']) }}
              </div>
            </div>
          </div>
        </div>
        @if(Session::has('fmessages'))
            <div class="alert alert-success" >
              {{ Session::get('fmessages') }}
            </div>
        @endif
        @include('block.error')
      </div>
    </div>
@endsection