<div class="col-sm-2 sidenav">
	<div class="col-sm-12 logo vert-offset-bottom-2">
		<h3><span class="fa fa-desktop fa-2x"></span>Admin Control</h3>
	</div>
	<div class="col-sm-12">
		<ul class="nav nav-pills nav-stacked vert-offset-bottom-2 menu">
			<li class="active">{!! HTML::link('admin', 'Home') !!}</li>
			<li>{!! HTML::link('admin/users', 'User') !!}</li>
		</ul>
		@if(isset($search))
			{!! Form::open([$search , 'id' => 'frmSearch', 'method' => 'get']) !!}
				<div class="input-group">
					{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
						   	<span class="fa fa-search"></span>
						</button>
					</span>
				</div>
			{{ Form::close() }}
		@endif
		
	</div>
</div>