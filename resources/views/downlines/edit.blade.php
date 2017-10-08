@extends('layouts.app2')

@section('content')


 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('downlines.index') }}">Data Pelanggan</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Pelanggan</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($downline, ['route' => ['downlines.update', $downline], 'method' => 'patch', 'class'=>'form-horizontal']) !!}
		@include('downlines._form', ['model' => $downline])
	{!! Form::close() !!}


@endsection