@extends('layouts.app2')

@section('content')


  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Transaksi Penjualan</a></li>
      </ul>
    </div>
  </div>

  <p></p>

  <div class="row">
    
      <div class="col-md-6">
        <a href="{{ route('sells.create') }}">
          <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Penjualan Baru
          </button>
        </a>
        @if (isset($q) )
        <a href="{{ route('sells.index') }}"><button type="button" class="btn btn-xs btn-link">Tampilkan Semua</button></a>
        @endif
        <p></p>
      </div>

      <div class="col-md-6">

        {!! Form::open(['url'=>'sells', 'method'=>'get', 'class'=>'']) !!}
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
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Modal</th>
                  <th>Harga Retail</th>
                  <th>Qty</th>
                  <th>Sub. Total</th>
                  <th>Margin</th>
                  <th>Pelanggan</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($sells as $sell)
              @if ($i > 1) @endif
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $sell->product->name or ''}}</td>
                  <td>{{ $sell->product->category->name or ''}}</td>
                  <td> Rp {{ number_format($sell->harga_awal) }}</td>
                  <td> Rp {{ number_format($sell->harga_retail) }}</</td>
                  <td>{{ $sell->qty}}</td>
                  <td>Rp {{ number_format($subtotal = $sell->harga_retail *= $sell->qty) }}  </td>
                  <td>Rp {{ number_format($subtotal - ($sell->harga_awal *= $sell->qty)) }}  </td>
                  <td>{{ $sell->customer->name or ''}}</td>
                  

                  <td>
                  {!! Form::model($sell, ['route' => ['sells.destroy', $sell], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                    <a href="{{ route('sells.edit', $sell->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                      {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                  {!! Form::close()!!}
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        <p>
          {{ $sells->appends(compact('q'))->links() }}
        </p>
      </div>

  </div>

@endsection