@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Penjualan</a></li>
    </ul>
    <p>
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
@endsection