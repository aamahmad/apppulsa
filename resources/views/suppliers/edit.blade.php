@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('suppliers.index') }}">Data Sales/Distributir</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Sales</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($supplier, ['route' => ['suppliers.update', $supplier], 'method' => 'patch']) !!}
		@include('suppliers._form', ['model' => $supplier])
	{!! Form::close() !!}

@endsection