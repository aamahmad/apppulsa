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
            {!! Form::select('q', ['0'=>'']+App\Customer::pluck('name','id')->all(), null, ['class'=>'form-control js-selectize','placeholder'=>'Pencarian pelanggan']) !!}
                <span class="input-group-btn">
                  {!! Form::submit('Cari', ['class'=>'btn btn-default']) !!}
                </span>
        {!! Form::close() !!}
      </div>

      <div class="col-md-12">

        <table class="table table-striped">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Tgl. Order</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Modal</th>
                  <th>Harga Retail</th>
                  <th>Qty</th>
                  <th>Sub. Total</th>
                  <th>Margin</th>
                  <th>Status</th>
                  <th>Keterangan</th>
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
                  <td>{{ date('d M Y', strtotime($sell->tgl)) }}</td>
                  <td>{{ $sell->product->name or ''}}</td>
                  <td>{{ $sell->product->category->name or ''}}</td>
                  <td> Rp {{ number_format($sell->harga_awal) }}</td>
                  <td> Rp {{ number_format($sell->harga_retail) }}</</td>
                  <td>{{ $sell->qty}}</td>
                  <td>Rp {{ number_format($subtotal = $sell->harga_retail *= $sell->qty) }}  </td>
                  <td>Rp {{ number_format($subtotal - ($sell->harga_awal *= $sell->qty)) }}  </td>
                  <td>
                    @if ( $sell->isLunas != 0 )
                      <a href="#"><span class="label label-success" data-toggle="modal" data-target="#myModal{{ $sell->id }}">Lunas</span></a>
                    @else
                      <a href="#"><span class="label label-danger" data-toggle="modal" data-target="#myModal{{ $sell->id }}">Belum Lunas</span></a>
                    @endif
                  </td>
                  <td>{{ $sell->ket1}}</td> 
                  <td>{{ $sell->customer->name or ''}}</td> 
                  <td>
                  {!! Form::model($sell, ['route' => ['sells.destroy', $sell], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                    
                      {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                  {!! Form::close()!!}
                  </td>
                </tr>
                <?php $i++; ?>

                <!-- Modal -->
<div class="modal fade" id="myModal{{ $sell->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Status Pembelian </h4>
      </div>
      <div class="modal-body">
        <h4><strong>Produk</strong></h4>
        Id Transaksi : <b>{{ $sell->id }}</b><br>
        Tgl. Transaksi : <b>{{ date('d M Y', strtotime($sell->tgl)) }}</b><br>
        Tgl. Input Transaksi : <b>{{ date('d M Y H:i:s', strtotime($sell->created_at)) }}</b><br>        
        Jenis Produk : <b>{{ $sell->product->jenis or ''}}</b><br>
        Nama Produk : <b>{{ $sell->product->name or ''}}</b><br>
        Harga Modal : <b>Rp {{ number_format($sell->harga_awal) }}</b><br>
        Harga Retail : <b>Rp {{ number_format($sell->harga_retail) }}</b><br>
        Qty : <b>{{ $sell->qty}}</b><br>
        Subtotal : <b>Rp {{ number_format($sell->sub_total) }}</b><br>

        <hr>
        <h4><strong>Pelanggan</strong></h4>
        Nama Pelanggan : <b>{{ $sell->customer->name or '-'}}</b><br>
        Keterangan 1 : <b>{{ $sell->ket1}}</b><br>
        Keterangan 2 : <b>{{ $sell->ket2}}</b><br>
        Status : <b>
          @if ( $sell->isLunas != 0 )
            <a href="#"><span class="label label-success" data-toggle="modal" data-target="#myModal{{ $sell->id }}">Lunas</span></a>
          @else
            <a href="#"><span class="label label-danger" data-toggle="modal" data-target="#myModal{{ $sell->id }}">Belum Lunas</span></a>
          @endif
          </b>
        <br>
        Terakhir dirubah status : <b>{{ date('d M Y H:i:s', strtotime($sell->updated_at)) }}</b><br>
        

        
        
        
        
      </div>
 
      <div class="modal-footer">
      {!! Form::model($sell->id, ['route' => ['sells.update', $sell->id], 'method' => 'patch','class'=>'form-horizontal form-inline js-confirm']) !!}

        @if ( $sell->isLunas != 0 )
          <input type="hidden" name="isLunas" value="0" >
          {!! Form::submit('Jadikan Belum Lunas', ['class'=>'btn btn-danger js-submit-confirm']) !!}
        @else
          <input type="hidden" name="isLunas" value="1" >
          {!! Form::submit('Jadikan Lunas', ['class'=>'btn btn-success js-submit-confirm']) !!}
        @endif

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
                @endforeach
            </tbody>
        </table>
        <p>
          {{ $sells->appends(compact('q'))->links() }}
        </p>
      </div>

  </div>

@endsection