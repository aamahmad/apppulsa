@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
      <div class="col-md-12">

	 	<ul class="nav nav-tabs" role="tablist">
	    	<li role="presentation" ><a href="{{ route('customers.index') }}">Data Pelanggan</a></li>
	    	<li role="presentation" class="active"><a href="#">Form Tambah Pelanggan</a></li>
	  	</ul>
	  	<p></p>
		{!! Form::open(['url' => route('customers.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}
			@include('customers._form')
		{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection