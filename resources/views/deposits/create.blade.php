@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('deposits.index') }}">Data Deposits</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Deposit</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'deposits.store']) !!}
		@include('deposits._form')
	{!! Form::close() !!}

</div>
@endsection