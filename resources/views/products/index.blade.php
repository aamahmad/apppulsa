@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Produk</a></li>
   	</ul>
   	<p>
	<table class="table table-bordered">
            <thead>
              	<tr>
                	<th>#</th>
                	<th>Nama</th>
                  <th>Satuan</th>
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
                  <td>{{ $product->satuan }}</td>
                  <td>{{ $product->category->name or '' }}</td>
                  <td>{{ $product->price->harga_dasar or '' }}</td>
	                <td>{{ $product->price->harga_jual or '' }}</td>
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
@endsection