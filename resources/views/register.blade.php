<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" type="image/x-icon" href="{!! url('public/ico/if_Desktop_858713.ico') !!}" />
      <title>Register</title>
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
    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Register to <b>EXCEL.VOOC.VN</b> - {!!Html::link('/', 'Login') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                      <h3 class="text-right-xs">Sign Up to your account</h3>
                      <p class="text-muted text-right-xs">
                          Please fill out the form below to create a new account.
                      </p>
                      <div class="form-white">
                          {!! Form::open(['url' => url('/PostRegister'), 'id' => 'frmRegister', 'method' => 'post']) !!}
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <label for="firstname">First name</label>
                                          {!! Form::text('f_name', null, ['id' => 'firstname', 'class'=>'form-control', 'title'=>'Please enter your firstname', 'placeholder'=>'Firstname']) !!}
                                      </div>
                                      <div class="col-sm-6">
                                          <label for="lastname">Last name</label>
                                          {!! Form::text('l_name', null, ['id' => 'lastname', 'class' => 'form-control', 'title' => 'Please enter your lastname', 'placeholder' => 'Lastname']) !!}
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="username">Username</label>
                                  {!! Form::text('username', null, ['id' => 'username', 'class'=>'form-control', 'title'=>'Please enter your username', 'placeholder'=>'username']) !!}
                              </div>
                              <div class="form-group">
                                  <label for="email">Email address</label>
                                  {!! Form::email('email', null, ['id' => 'email', 'class'=>'form-control', 'title'=>'Please enter your email', 'placeholder'=>'Enter email']) !!}
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-sm-6">
                                          <label for="password">Password</label>
                                          {!! Form::input('password', 'password', null, ['id' => 'password', 'class' => 'form-control', 'title'=>'Please enter your password', 'placeholder'=>'Password']) !!}
                                      </div>
                                      <div class="col-sm-6">
                                          <label for="password_confirmation">Repeat password</label>
                                          {!! Form::input('password', 'password_confirmation', null, ['id' => 'password_confirmation', 'class' => 'form-control', 'title'=>'Please enter your Repeat password', 'placeholder'=>'Repeat password']) !!}
                                      </div>
                                  </div>
                              </div>
                              <div class="checkbox">
                                  <label>
                                      {!! Form::input('checkbox', 'policy', null) !!}I agree to the <a .html# ">Terms of Service</a> and <a href=".html# ">Privacy Policy</a>
                                  </label>
                              </div>
                              {!! Form::submit('Create an account', ['class'=>'btn btn-success btn-block', 'name' => 'submit', 'value' => 'register']) !!}
                          {!! Form::close() !!}
                      </div>
                      <br/>
                      @if(Session::has('fregister'))
                          <div class="alert alert-success" >
                              {{ Session::get('fregister') }}
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