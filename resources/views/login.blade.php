<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="{!! url('public/ico/if_Desktop_858713.ico') !!}" />
		<title>Login</title>
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
              <h4 class="modal-title" id="myModalLabel">Login to <b>EXCEL.VOOC.VN</b></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          {!! Form::open(array('url' => url('/PostLogin'), 'id'=>'frmLogin', 'method' => 'post')) !!}
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>            
                                  {!! Form::text('username', Cookie::get('username'), ['class'=>'form-control', 'title'=>'Please enter your username', 'placeholder'=>'username']) !!}
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  {!! Form::input('password', 'password', Cookie::get('password'), ['class' => 'form-control', 'title'=>'Please enter your password', 'placeholder'=>'Password']) !!}
                                 
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                              <div class="checkbox">
                                  <label>
                                        @if (Cookie::has('username') ||  Cookie::has('password'))
                                              {!! Form::input('checkbox', 'remember', null, ['checked' => true]) !!}
                                        @else
                                              {!! Form::input('checkbox', 'remember', null, ['checked' => false]) !!}   
                                        @endif
                                        Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                                  {!! Html::link('sendChangePassword', 'Forgot your account\'s password ?') !!}
                              </div>    
                              {!! Form::submit('Login', ['class'=>'btn btn-success btn-block', 'name' => 'submit', 'value' => 'login']) !!}
                          {!! Form::close() !!}
                      </div>
                      @if(Session::has('flogin'))
                          <div class="alert alert-danger" >
                              {{ Session::get('flogin') }}
                          </div>
                      @endif
                      @include('block.error')
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> See all your orders</li>
                          <li><span class="fa fa-check text-success"></span> Shipping is always free</li>
                          <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                          <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <li><span class="fa fa-check text-success"></span>Holiday discounts up to 30% off</li>
                      </ul>
                      <p>{!!Html::link('register', 'Yes please, register now!', array('class' => 'btn btn-info btn-block')) !!}</p>
                  </div>
              </div>
          </div>
      </div>

  </div>
</body>
</html>
