@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Sales</a></li>
   	</ul>
   	<p>
	<table class="table table-bordered">
            <thead>
              	<tr>
                	<th>#</th>
                	<th>Nama</th>
                  <th>No. Hp/Telp</th>
                  <th>Email</th>
	                <th>Alamat</th>
	                <th></th>
              	</tr>
            </thead>
            <tbody>
            	<?php $i = 1; ?>
            	@foreach($suppliers as $supplier)
            	@if ($i > 1) @endif
              	<tr>
	                <td>{{ $i }}</td>
                  <td>{{ $supplier->name }}</td>
                  <td>{{ $supplier->no_telp }}</td>
	                <td>{{ $supplier->email }}</td>
	                <td>{{ $supplier->alamat}}</td>
	                <td>
	                {!! Form::model($supplier, ['route' => ['suppliers.destroy', $supplier], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 		<a href="{{ route('suppliers.edit', $supplier->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  		{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                	{!! Form::close()!!}
	                </td>
              	</tr>
              	<?php $i++; ?>
              	@endforeach
            </tbody>
   	</table>
   	<p>
    	{{ $suppliers->appends(compact('q'))->links() }}
    </p>

</div>
@endsection