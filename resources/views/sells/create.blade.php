@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('sells.index') }}">Data Trx Penjualan</a></li>
    	<li role="presentation" class="active"><a href="#">Form Transaksi Penjualan Baru</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'sells.store']) !!}
		@include('sells._form')
	{!! Form::close() !!}

</div>
@endsection