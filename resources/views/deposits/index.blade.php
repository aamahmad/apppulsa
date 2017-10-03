@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Deposit</a></li>
   	</ul>
   	<p>
	<table class="table table-bordered">
            <thead>
              	<tr>
                	<th>#</th>
                  <th>Distributor/Sales</th>
                	<th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Tgl. Order</th>
	                <th></th>
              	</tr>
            </thead>
            <tbody>
            	<?php $i = 1; ?>
            	@foreach($deposits as $deposit)
            	@if ($i > 1) @endif
              	<tr>
	                <td>{{ $i }}</td>
                  <td>{{ $deposit->supplier->name or ''}}</td>
                  <td>{{ $deposit->category->name or ''}}</td>
                  <td>{{ $deposit->jumlah }}</td>
	                <td>{{ $deposit->tgl_beli }}</td>
	                <td>
	                {!! Form::model($deposit, ['route' => ['deposits.destroy', $deposit], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 		<a href="{{ route('deposits.edit', $deposit->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  		{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                	{!! Form::close()!!}
	                </td>
              	</tr>
              	<?php $i++; ?>
              	@endforeach
            </tbody>
   	</table>
   	<p>
    	{{ $deposits->appends(compact('q'))->links() }}
    </p>

</div>
@endsection