@extends('layouts.app2')

@section('content')

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('deposits.index') }}">Data Deposit</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Deposit</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($deposit, ['route' => ['deposits.update', $deposit], 'method' => 'patch']) !!}
		@include('deposits._form', ['model' => $deposit])
	{!! Form::close() !!}


@endsection