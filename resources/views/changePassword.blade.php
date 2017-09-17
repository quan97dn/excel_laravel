<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" type="image/x-icon" href="{!! url('public/ico/if_Desktop_858713.ico') !!}" />
      <title>Change Your Password</title>
      {!! Html::style('public/css/bootstrap/css/bootstrap.min.css') !!} 
      {!! Html::style('public/css/bootstrap/css/bootstrap-theme.min.css') !!}
      {!! Html::style('public/css/bootstrap/css/bootstrap-3-vert-offset-shim.css') !!} 
      {!! Html::style('public/css/font-awesome.min.css') !!}
      <style type="text/css" media="screen">
          body{
              padding-top:20px;
              background-image: url('{!! url('public/img/bg-login.jpg') !!}');
              background-repeat: no-repeat;
          }
      </style>
  </head>
  <body>
    <div id="login-overlay col-sm-10" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Change Your Password to <b>EXCEL.VOOC.VN</b> - {!!Html::link('/', 'Login') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <h3 class="text-right-xs">Change pasword to your account</h3>
                      <p class="text-muted text-right-xs">
                          Enter your account change password.
                      </p>
                      <div class="form-white">
                          {!! Form::open(['route' => ['setChangePasswordEmail', $user[0]['id']], 'id' => 'frmChangePasswordEmail', 'method' => 'post']) !!}     
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-sm-12">
                                          <label for="password">New Password</label>
                                          {!! Form::input('password', 'password', null, ['id' => 'password', 'class' => 'form-control', 'title'=>'Please enter your password', 'placeholder'=>'Password']) !!}
                                      </div>
                                      <div class="col-sm-12">
                                          <label for="password_confirmation">Repeat password</label>
                                          {!! Form::input('password', 'password_confirmation', null, ['id' => 'password_confirmation', 'class' => 'form-control', 'title'=>'Please enter your Repeat password', 'placeholder'=>'Repeat password']) !!}
                                      </div>
                                  </div>
                              </div>
                              {!! Form::submit('Change', ['class'=>'btn btn-success btn-block', 'name' => 'submit', 'value' => 'change']) !!}
                          {!! Form::close() !!}
                      </div>
                      <br/>
                      @if(Session::has('fmessages'))
                          <div class="alert alert-success" >
                              {{ Session::get('fmessages') }}
                          </div>
                      @endif
                      @include('block.error')
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>