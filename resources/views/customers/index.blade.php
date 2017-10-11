@extends('layouts.app2')

@section('content')
  <div class="row">
 	  <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Pelanggan</a></li>
      </ul>
    </div>
  </div>
  <p></p>
  <div class="row">
    
      <div class="col-md-6">
        <a href="{{ route('customers.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Tambah Pelanggan
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('customers.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'customers', 'method'=>'get', 'class'=>'']) !!}
          <div class="input-group {!! $errors->has('q') ? 'has-error' : '' !!}">
            {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder'=>'Pencarian...']) !!}
                <span class="input-group-btn">
                  {!! Form::submit('Cari', ['class'=>'btn btn-default']) !!}
                </span>
          </div>
        {!! Form::close() !!}
      </div>

      <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              	<tr>
                	<th>#</th>
                	<th>Nama</th>
                  <th>Alamat</th>
                  <th>Data Nomor</th>
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
	                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a></td>
                  <td>{{ $customer->alamat }}</td>
                  <td>
                     @foreach(App\Nomor::where('customer_id',$customer->id)->get() as $nomorcustomer)
                      <span class="label label-success"><b>{{ $nomorcustomer->nomor }} | {{ $nomorcustomer->keterangan }}</b></span>
                     @endforeach
                  </td>
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

  </div>


@endsection