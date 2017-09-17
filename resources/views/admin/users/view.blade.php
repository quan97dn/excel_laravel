@extends('templates.templates')
@section('title')
	View User
@endsection
@section('content')
	<div class="col-sm-12 vert-offset-top-1">
      <div class="col-md-6">
        <div class="panel panel-default panel-table ">
          <div class="panel-heading">
            <div class="row">
              <div class="col col-xs-6">
                <h3 class="panel-title">VIEW USER</h3>
              </div>
              <div class="col col-xs-6 text-right">
                {{ Html::link('/admin/users/create', null, array('class' => 'btn btn-sm btn-primary btn-create')) }}

                {{ Html::link('/admin/users/update/'.$user->id.'', null, array('class' => 'btn btn-sm btn-info btn-update')) }}

                {{ Html::link('/admin/users/delete/'.$user->id.'', null, array('class' => 'btn btn-sm btn-danger btn-delete')) }}
              </div>
            </div>
          </div>
          <div class="panel-body">
              <table class="table table-bordered" >
                  <tr>
                      <td class="col-sm-3">ID</td>
                      <td>{{ $user['id'] }}</td>
                  </tr>
                  <tr>
                      <td class="col-sm-3">First name</td>
                      <td>{{ $user['f_name'] }}</td>
                  </tr>
                  <tr>
                      <td class="col-sm-3">Last name</td>
                      <td>{{ $user['l_name'] }}</td>
                  </tr>
                  <tr>
                      <td class="col-sm-3">Username</td>
                      <td>{{ $user['username'] }}</td>
                  </tr>
                  <tr>
                      <td class="col-sm-3">Email</td>
                      <td>{{ $user['email'] }}</td>
                  </tr>
                  <tr>
                      <td class="col-sm-3">Level</td>
                      <td>
                        {{ $user['level'] == 0 ? 'Admin' : 'Member' }}
                      </td>
                  </tr>
                  <tr>
                      <td class="col-sm-3">Avatar</td>
                      <td>
                          {!!Html::image(($user['image'] != null ? $user['image'] : 'public/img/no-avatar.jpg'), Null, ['class' => 'col-sm-5 img-thumbnail'])!!}
                      </td>         
                  </tr>
              </table>
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col col-xs-4">
                  {{ Html::link('/admin/users', 'Back', ['class' => 'btn btn-success btn-back ']) }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection