@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('stocks.index') }}">Data Stock</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Stock Baru</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'stocks.store']) !!}
		@include('stocks._form')
	{!! Form::close() !!}


@endsection