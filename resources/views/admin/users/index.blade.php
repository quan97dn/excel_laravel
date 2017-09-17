@extends('templates.templates')
@section('title')
	List User
@endsection
@section('content')
	<div class="col-sm-12 vert-offset-top-1">
		<div class="col-md-12">
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-6">
              <h3 class="panel-title">LIST USER</h3>
            </div>
            <div class="col col-xs-6 text-right">
               {{ Html::link('/admin/users/create', null, array('class' => 'btn btn-sm btn-primary btn-create')) }}
              {{ Html::link('#', null, array('class' => 'btn btn-sm btn-danger btn-delete-all')) }}
            </div>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-list">
            <thead>
              <tr>
              	<th class="col-sm-1 text-center" ><em class="fa fa-trash"></em></th>
                  <th class="hidden-xs">ID</th>
                  <th>FullName</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th class="col-sm-2 text-center" ><em class="fa fa-cog"></em></th>
              </tr> 
            </thead>
            <tbody class="question" >
            		{!! Form::open(['url' => url('/admin/users/deleteall'), 'id' => 'frmChecked', 'method' => 'post']) !!}
              	@foreach ($users as $user)
			              <tr>
                      	<td align="center">
                           {!! Form::input('checkbox', 'checked[]', $user->id) !!}
                        </td>
                        <td class="hidden-xs">{{ $user->id }}</td>
                        <td>{{ $user->f_name.' '.$user->l_name }}</td>
                        <td>{{ $user->username}}</td>
                        <td>{{ $user->email}}</td>
                        <td align="center">
              
                          {{ Html::link('/admin/users/view/'.$user->id.'', 'View', array('class' => 'btn btn-sm btn-default btn-view')) }}
                         
                          {{ Html::link('/admin/users/update/'.$user->id.'', 'Update', array('class' => 'btn btn-sm btn-default btn-update')) }}
                          
                          {{ Html::link('/admin/users/delete/'.$user->id.'', 'Delete', array('class' => 'btn btn-sm btn-danger btn-delete')) }}

                        </td>
                    </tr>
    						@endforeach
    						{!! Form::submit(null, ['id' => 'btnSubmit', 'style' => 'display:none;']) !!}
    						{!! Form::close() !!}    
            </tbody>
          </table>          
        </div>
        <div class="panel-footer">
          @include('block.paginate')
        </div>
      </div>
		</div>
	</div>
@endsection