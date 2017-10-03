@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('categories.index') }}">Kategori</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Kategori Baru</a></li>
  	</ul>
  	<p></p>

	{!! Form::open(['route' => 'categories.store']) !!}
		@include('categories._form')
	{!! Form::close() !!}

</div>
@endsection