@extends('templates.templates')
@section('title')
  Update User
@endsection
@section('content')
  <div class="col-sm-12 vert-offset-top-1">
      <div class="col-md-6">
        <div class="panel panel-default panel-table ">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">UPDATE USER</h3>
              </div>
              <div class="col col-xs-6 text-right">
                {{ Html::link('#', null, ['class' => 'btn btn-sm btn-info btn-update']) }}
                {{ Html::link(route('users.getResetPass', ['id' => $users->id]), null, array('class' => 'btn btn-sm btn-info btn-resetPass')) }}
                {{ Html::link('#', null, array('class' => 'btn btn-sm btn-warning btn-reset')) }}
              </div>
            </div>
          </div>
          <div class="panel-body">
              <div class="col-sm-12 vert-offset-top-1 vert-offset-bottom-1" >              
                  {!! Form::model($users, ['route' => ['users.setUpdate', $users->id], 'id' => 'frmUpdate', 'method' => 'post', 'files'=> true]) !!}  
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
                      <label for="level">Level</label>
                      {!! Form::select('level', ['0' => 'Admin', '1' => 'Member'], null, ['class' => 'form-control']) !!}
                    </div>
                  </div>
                 <div class="form-group">
                      <div class="col-sm-12">
                        <label for="image">Avatar</label>
                        <br>
                        @if(!empty($users->image))
                          <td>
                            <div class="col-sm-11" style="padding:0; margin: 0;">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                 {!! Html::image($users->image, Null, ['class' => 'col-sm-5 img-thumbnail']) !!}
                                 {{ Form::hidden('fimage', $users->image) }}
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{!! route('users.getDeleteImg', ['id' => $users->id]) !!}"><i class="fa fa-trash"></i> Delete </a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-ban"></i> Cancel </a></li>
                              </ul>
                            </div>
                          </td>
                        @else
                          <td>
                             {!! Form::file('fileImage', ['id' => 'fileImage','class' => 'form-control']) !!}
                          </td>   
                        @endif   
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
      @if(Session::has('fmessages'))
        <div class="alert alert-success" >
          {{ Session::get('fmessages') }}
        </div>
      @endif
      @include('block.error')
    </div>
  </div>
@endsection