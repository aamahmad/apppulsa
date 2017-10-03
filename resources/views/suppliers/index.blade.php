@extends('layouts.app')

@section('content')
<div class="container">

 	<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Sales disttributor</a></li>
      </ul>
    </div>
  </div>
  <p></p>

  <div class="row">
  <div class="col-md-6">
        <a href="{{ route('suppliers.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sales baru
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('suppliers.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'suppliers', 'method'=>'get', 'class'=>'']) !!}
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

  </div>

</div>
@endsection