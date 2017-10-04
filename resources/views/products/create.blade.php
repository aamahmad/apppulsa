@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('products.index') }}">Data Produk</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Produk Baru</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'products.store']) !!}
		@include('products._form')
	{!! Form::close() !!}

</div>
@endsection