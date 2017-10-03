@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Kategori</a></li>
   	</ul>
   	<p>
	<table class="table table-bordered">
            <thead>
              	<tr>
                  <th>#</th>
                	<th>ID</th>
                  <th>Nama</th>
                	<th>ID</th>
	                <th></th>
              	</tr>
            </thead>
            <tbody>
            	<?php $i = 1; ?>
            	@foreach($categories as $category)
            	@if ($i > 1) @endif
              	<tr>
	                <td>{{ $i }}</td>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->induk_id }}</td>
	                <td>
	                {!! Form::model($category, ['route' => ['categories.destroy', $category], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 		<a href="{{ route('categories.edit', $category->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  		{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                	{!! Form::close()!!}
	                </td>
              	</tr>
              	<?php $i++; ?>
              	@endforeach
            </tbody>
   	</table>
   	<p>
    	{{ $categories->appends(compact('q'))->links() }}
    </p>

</div>
@endsection