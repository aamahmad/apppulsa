@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('stocks.index') }}">Data Stok</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Stok</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($stock, ['route' => ['stocks.update', $stock], 'method' => 'patch']) !!}
		@include('stocks._form', ['model' => $stock])
	{!! Form::close() !!}


@endsection