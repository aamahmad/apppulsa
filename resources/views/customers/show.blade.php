@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
      	<div class="col-md-12">
		 	<ul class="nav nav-tabs" role="tablist">
		    	<li role="presentation" ><a href="{{ route('customers.index') }}">Data Pelanggan</a></li>
		    	<li role="presentation" class="active"><a href="#">Detail Pelanggan : <strong>{{ $customer->name }}</strong></a></li>
		  	</ul>
		  	<p></p>
		  	<div class="row">
		        <div class="col-md-6">
					<div class="panel panel-success">
			            <div class="panel-heading">
			              <h3 class="panel-title">Data Pelanggan</h3>
			            </div>
		            	<div class="panel-body">
		            	
		              	<table>
			              	<tr >
			              		<td width="60%">Nama</td>
			              		<td>: <b> {{ $customer->name }}</b></td>
			              	</tr>
			              	<tr>
			              		<td>Alamat</td>
			              		<td>: <b>{{ $customer->alamat }}</b></td>
			              	</tr>
			              	<tr>
			              		<td>Jenis </td>
			              		<td>: 
			              			<span class="label label-default">pelanggan</span>
					                @if (isset($customer->downline->markup))
					                <span class="label label-info">Downline</span>
					                @endif
			              		</td>
			              	</tr>
		              	</table>
		              	<p></p>
		              	<a href="#">
				        	<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
				          	<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Tambah data
				          	</button>
				        </a>
				        <p></p>
		              	<table class="table">
		              		<tr>
		              			<td><b>No.</b></td>
		              			<td><b>Data Nomor</b></td>
		              			<td><b>Keterangan</b></td>
		              			<td><b>Edit / Hapus</b></td>
		              		</tr>
		              		<?php $i = 1; ?>
			            	@foreach($datanomor as $datanomor)
			            	@if ($i > 1) @endif
			              		<tr>
			              			<td>{{ $i }}</td>
			              			<td>{{ $datanomor->nomor}}</td>
			              			<td>{{ $datanomor->keterangan}}</td>
			              			<td>
			              				{!! Form::model($datanomor, ['route' => ['nomors.destroy', $datanomor], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                 						<a href="{{ route('nomors.edit', $datanomor->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                  						{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                						{!! Form::close()!!}
			              			</td>
			              		</tr>
		              		<?php $i++; ?>
              				@endforeach
		              	</table>
		              	</div>	
		          	</div>
		        </div>
	        </div>

	        
	        <div class="row">
	        	<div class="col-md-12">
				<div class="panel panel-success">
			        <div class="panel-heading">
			            <h3 class="panel-title">Data Transaksi</h3>
			        </div>
			        <div class="panel-body">
			        <table class="table">
		              		<tr>
		              			<td><b>No.</b></td>
		              			<td><b>Jenis Produk</b></td>
		              			<td><b>Jenis Produk</b></td>
		              		</tr>
			        <?php $i = 1; ?>
			            	@foreach($trxpelanggans as $trxpelanggan)
			            	@if ($i > 1) @endif
			              		<tr>
			              			<td>{{ $i }}</td>
			              			<td>{{ $trxpelanggan->jenis}}</td>
			              			<td>{{ $trxpelanggan->customer_id}}</td>
			              		</tr>
		              		<?php $i++; ?>
              				@endforeach
              			</tr>
              		</table>

			        </div>
			    </div>
			    </div>
		    </div>
		   
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Nomor</h4>
      </div>
      {!! Form::open(['url' => route('nomors.store'),'method' => 'post']) !!}
      <div class="modal-body">
      
        <div class="form-group {!! $errors->has('nomor') ? 'has-error' : '' !!}">
			{!! Form::label('nomor', 'Data Nomor') !!}
			{!! Form::text('nomor', null, ['class'=>'form-control']) !!}
			{!! Form::hidden('customer_id', $customer->id , null, ['class'=>'form-control']) !!}
			{!! $errors->first('Nomor', '<p class="help-block">:message</p>') !!}
		</div>

		<div class="form-group {!! $errors->has('keterangan') ? 'has-error' : '' !!}">
			{!! Form::label('keterangan', 'Keterangan') !!}
			{!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
			{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
		</div>
		

		{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
      
      </div>
      {!! Form::close() !!}
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection