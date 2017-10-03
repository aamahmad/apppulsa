@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('suppliers.index') }}">Data Sales/Distributir</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Sales Baru</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'suppliers.store']) !!}
		@include('suppliers._form')
	{!! Form::close() !!}

</div>
@endsection