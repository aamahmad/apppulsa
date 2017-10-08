@extends('layouts.app2')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Produk</a></li>
      </ul>
    </div>
  </div>

  <p></p>

  <div class="row">
    
      <div class="col-md-6">
        <a href="{{ route('products.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Produk Baru
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('products.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'products', 'method'=>'get', 'class'=>'']) !!}
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
                	<th>Nama</th>
                  <th>Jenis</th>
                  <th>Kategori</th>
                  <th>Harga Dasar</th>
                  <th>Harga Jual</th>
	                <th></th>
              	</tr>
            </thead>
            <tbody>
            	<?php $i = 1; ?>
            	@foreach($products as $product)
            	@if ($i > 1) @endif
              	<tr>
	                <td>{{ $i }}</td>
                  <td>{{ $product->name}}</td>
                  <td>{{ $product->jenis }}</td>
                  <td>{{ $product->category->name or '' }}</td>
                  <td>{{ $product->harga_dasar}}</td>
	                <td>{{ $product->harga_jual}}</td>
	                <td>
	                {!! Form::model($product, ['route' => ['products.destroy', $product], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 		<a href="{{ route('products.edit', $product->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  		{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                	{!! Form::close()!!}
	                </td>
              	</tr>
              	<?php $i++; ?>
              	@endforeach
            </tbody>
   	    </table>
         	<p>
          	{{ $products->appends(compact('q'))->links() }}
          </p>
      </div>

  </div>

@endsection