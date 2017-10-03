@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Kategori</a></li>
      </ul>
    </div>
  </div>

  <p></p>
  
  <div class="row">
    
      <div class="col-md-6">
        <a href="{{ route('categories.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Kategori Baru
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('categories.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'categories', 'method'=>'get', 'class'=>'']) !!}
          <div class="input-group {!! $errors->has('q') ? 'has-error' : '' !!}">
            {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder'=>'Pencarian...']) !!}
                <span class="input-group-btn">
                  {!! Form::submit('Cari', ['class'=>'btn btn-default']) !!}
                </span>
          </div>
        {!! Form::close() !!}
      </div>

      <div class="col-md-12">
        
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

  </div>
</div>
@endsection