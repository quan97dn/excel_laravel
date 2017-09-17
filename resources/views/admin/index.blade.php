@extends('templates.templates')
@section('title')
	Admin
@endsection
@section('content')
	<div class="col-sm-9" >
		<div class="row">
    
		    <div class="col-md-3 barLogoB">
		        <a href="{!! url('/') !!}">
		            <span class="glyphicon glyphicon-home spanGlyphicon">
		                <div class="col-xs-8 col-md-5 pull-right">
		                    <p>
								Home
		                    </p>
		                </div>
		        </a>
		    </div>
		    <div class="col-md-3 barLogoB">
		        <a href="{!! url('admin/users') !!}">
		            <span class="glyphicon glyphicon-user spanGlyphicon">
		                <div class="col-xs-8 col-md-5 pull-right">
		                    <p>
								User {!! $count['user'] !!}
		                    </p>
		                </div>
		        </a>
		    </div>
		    <div class="col-md-3 barLogoB">
		        <a href="#">
		            <span class="glyphicon glyphicon-bullhorn spanGlyphicon">
		                <div class="col-xs-8 col-md-5 pull-right">
		                    <p>
								Notify 20
		                    </p>
		                </div>
		        </a>
		    </div>
		</div>

	</div>
@endsection