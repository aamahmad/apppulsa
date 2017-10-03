@extends('layouts.app')

@section('content')
<div class="container">

 	<ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Pelanggan</a></li>
   	</ul>
   	<p>
	<table class="table table-bordered">
            <thead>
              	<tr>
                	<th>#</th>
                	<th>Nama</th>
                  <th>No Hp</th>
	                <th>Jenis</th>
	                <th></th>
              	</tr>
            </thead>
            <tbody>
            	<?php $i = 1; ?>
            	@foreach($customers as $customer)
            	@if ($i > 1) @endif
              	<tr>
	                <td>{{ $i }}</td>
	                <td>{{ $customer->name }}</td>
                  <td>{{ $customer->no_hp}}</td>
                  <td><span class="label label-default">pelanggan</span>
                  @if (isset($customer->downline->markup))
                  <span class="label label-info">Downline</span>
                  @endif
                  </td>

	                <td>
	                {!! Form::model($customer, ['route' => ['customers.destroy', $customer], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 		<a href="{{ route('customers.edit', $customer->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  		{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                	{!! Form::close()!!}
	                </td>
              	</tr>
              	<?php $i++; ?>
              	@endforeach
            </tbody>
   	</table>
   	<p>
    	{{ $customers->appends(compact('q'))->links() }}
    </p>

</div>
@endsection