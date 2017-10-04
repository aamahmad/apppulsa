@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('customers.index') }}">Data Pelanggan</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Pelanggan</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($customer, ['route' => ['customers.update', $customer], 'method' => 'patch']) !!}
		@include('customers._form', ['model' => $customer])
	{!! Form::close() !!}

</div>
@endsection