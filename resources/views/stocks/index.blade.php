@extends('layouts.app2')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Stok</a></li>
      </ul>
    </div>
  </div>

  <p></p>
  
  <div class="row">
    
      <div class="col-md-6">
        <a href="{{ route('stocks.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Stock Baru
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('stocks.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'stocks', 'method'=>'get', 'class'=>'']) !!}
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
                  <th>Distributor/Sales</th>
                  <th>Nama Produk</th>
                  <th>Stok</th>
                  <th>Tgl. Order</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($stocks as $stock)
              @if ($i > 1) @endif
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $stock->supplier->name or ''}}</td>
                  <td>{{ $stock->product->name or ''}}</td>
                  <td>{{ $stock->jumlah }}</td>
                  <td>{{ $stock->tgl_beli }}</td>
                  <td>
                  {!! Form::model($stock, ['route' => ['stocks.destroy', $stock], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                    <a href="{{ route('stocks.edit', $stock->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                      {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                  {!! Form::close()!!}
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        
        <p>
          {{ $stocks->appends(compact('q'))->links() }}
        </p>
      </div>

  </div>

@endsection