@extends('templates.templates')
@section('title')
	Change Password
@endsection
@section('content')
	<div class="col-sm-12 vert-offset-top-1">
      <div class="col-md-7">
        <div class="panel panel-default panel-table ">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">Change Password User</h3>
              </div>
              <div class="col col-xs-6 text-right">
                {{ Html::link('#', null, ['class' => 'btn btn-sm btn-info btn-update']) }}
                {{ Html::link('#', null, array('class' => 'btn btn-sm btn-warning btn-reset')) }}
              </div>
            </div>
          </div>
          <div class="panel-body">
          {!! Form::open(['url' => url('admin/users/PostChangePassword'), 'id' => 'frmUpdate', 'method' => 'post']) !!}
            <div class="col-sm-12 vert-offset-top-1 vert-offset-bottom-1 " >
               <div class="form-group">
                  <div class="col-sm-12">
                    <label for="currentPassword">Current password</label>
                    {!! Form::input('password', 'currentPassword', null, ['id' => 'currentPassword', 'class' => 'form-control', 'title'=>'Please enter your current password', 'placeholder'=>'current Password']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="new_password">New password </label>
                    {!! Form::input('password', 'password', null, ['id' => 'new_password', 'class' => 'form-control', 'title'=>'Please enter your new password', 'placeholder'=>'new password']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="password_confirmation">Repeat new password</label>
                    {!! Form::input('password', 'password_confirmation', null, ['id' => 'password_confirmation', 'class' => 'form-control', 'title'=>'Please enter your Repeat password', 'placeholder'=>'Repeat password']) !!}
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