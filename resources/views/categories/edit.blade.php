@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('categories.index') }}">Kategori</a></li>
    	<li role="presentation" class="active"><a href="#">Form Ubah Kategori</a></li>
  	</ul>
  	<p></p>

	{!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'patch']) !!}
		@include('categories._form', ['model' => $category])
	{!! Form::close() !!}

</div>
@endsection