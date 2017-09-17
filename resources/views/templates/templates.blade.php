<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{!! url('public/ico/if_Desktop_858713.ico') !!}" />
    <title>@yield('title')</title>
    {!! Html::style('public/css/bootstrap/css/bootstrap.min.css') !!} 
    {!! Html::style('public/css/bootstrap/css/bootstrap-theme.min.css') !!}
    {!! Html::style('public/css/bootstrap/css/bootstrap-3-vert-offset-shim.css') !!} 
    {!! Html::style('public/css/font-awesome.min.css') !!} 
    {!! Html::style('public/css/mystyle.css') !!}
    {!! Html::style('public/css/home.css') !!}
</head>
<body>
    <div class="container-fluid">
        <div class="row content">
            @include('templates.header')
            <div class="col-sm-10 row-right">
                <div class="col-sm-12 nav-profile" >
                    <div class="col-sm-2 pull-right dropdown-profile">
                        <div class="dropdown pull-right">
                            <i class="fa fa-bars fa-2x cldrop" aria-hidden="true" data-toggle="dropdown"></i>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <div class="navbar-content">
                                        <div class="row">
                                            <div class="col-sm-5">
  												{!!Html::image((Session::get('profile')->image != null ? Session::get('profile')->image : 'public/img/no-avatar.jpg'), Null, array('class' => 'img-responsive', 'style' => 'width:120px;'))!!}                
                                                <p class="text-center small changephoto">
                                                    <a id="changephoto" href="#">Change Photo</a>
                                                </p>

                                                {!! Form::open(['url' => url('admin/users/PostChangeImage'), 'id' => 'frmChangeImage', 'method' => 'post', 'files'=> true]) !!}

                                                {!! Form::file('fileImage', ['id' => 'changImage','class' => 'form-control', 'style' => 'display:none;']) !!}

                                                {!! Form::submit(null, ['id' => 'btnSubmit', 'style' => 'display:none;']) !!}

                                                {!! Form::close() !!}

                                            </div>
                                            <div class="col-sm-7">
                                                <span>{!! Session::get('profile')->l_name !!}</span>
                                                <p class="text-muted small">
                                                    {!! Session::get('profile')->email !!}</p>
                                                <div class="divider"></div>
                                                {{ Html::link('/admin/users/profile', 'View Profile', array('class' => 'btn btn-primary btn-sm active')) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-footer">
                                        <div class="navbar-footer-content">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    {{ Html::link('/admin/users/changePassword', 'Change Passowrd', array('class' => 'btn btn-default btn-sm')) }}
                                                </div>
                                                <div class="col-sm-6">
                                                    {{ Html::link('/logout', 'Sign Out', array('class' => 'btn btn-default btn-sm pull-right')) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 yicontent">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('templates.footer') 
    {!! Html::script('public/js/jquery.min.js') !!} 
    {!! Html::script('public/js/bootstrap.min.js') !!} 
    {!! Html::script('public/js/myjs.js') !!}
</body>
</html>