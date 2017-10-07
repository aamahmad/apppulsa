@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('products.index') }}">Data Produk</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah : {{ $product->name }}</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'patch','class'=>'form-horizontal']) !!}
		@include('products._form', ['model' => $product])
	{!! Form::close() !!}


@endsection