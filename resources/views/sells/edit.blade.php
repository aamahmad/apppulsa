@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('sells.index') }}">Data Penjualan</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Penjualan</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($sell, ['route' => ['sells.update', $sell], 'method' => 'patch','class'=>'form-horizontal']) !!}
		@include('sells._form', ['model' => $sell])
	{!! Form::close() !!}


@endsection