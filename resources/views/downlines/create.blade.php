@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('customers.index') }}">Data Pelanggan</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Pelanggan</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'customers.store']) !!}
		@include('customers._form')
	{!! Form::close() !!}


@endsection