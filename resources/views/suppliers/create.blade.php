@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('suppliers.index') }}">Data Sales/Distributir</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Sales Baru</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'suppliers.store']) !!}
		@include('suppliers._form')
	{!! Form::close() !!}


@endsection