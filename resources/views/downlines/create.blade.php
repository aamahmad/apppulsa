@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-md-12">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('downlines.index') }}">Data Downline</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Downline</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'downlines.store','method' => 'post', 'class'=>'form-horizontal']) !!}
		@include('downlines._form')
	{!! Form::close() !!}

	</div>
</div>

@endsection