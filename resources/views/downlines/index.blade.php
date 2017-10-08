@extends('layouts.app2')

@section('content')
  <div class="row">
 	  <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Downline</a></li>
      </ul>
    </div>
  </div>
  <p></p>
  <div class="row">
    
      <div class="col-md-6">
        <a href="{{ route('downlines.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Tambah Downline
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('downlines.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'downlines', 'method'=>'get', 'class'=>'']) !!}
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
                	<th>Markup</th>
                  	<th>Alamat</th>
                  	<th>Nomor HP Terdaftar</th>
	                <th></th>
              	</tr>
            </thead>
            <tbody>
            	<?php $i = 1; ?>
            	@foreach($downlines as $downline)
            	@if ($i > 1) @endif
              	<tr>
	                <td>{{ $i }}</td>
	                <td><a href="{{ route('customers.show', $downline->customer_id) }}">{{ $downline->customer->name }}</a></td>
	                <td>{{ $downline->markup}}</td>
	                <td>{{ $downline->customer->alamat }}</td>
	                <td>{{ $downline->nomor }}</td>
	                <td>
	                {!! Form::model($downline, ['route' => ['downlines.destroy', $downline], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 		<a href="{{ route('downlines.edit', $downline->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  		{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                	{!! Form::close()!!}
	                </td>
              	</tr>
              	<?php $i++; ?>
              	@endforeach
            </tbody>
   	    </table>
   	    <p>
    	    {{ $downlines->appends(compact('q'))->links() }}
        </p>
      </div>

  </div>


@endsection