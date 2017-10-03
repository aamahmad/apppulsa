@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Data Stok</a></li>
    </ul>
    <p>
  <table class="table table-bordered">
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
@endsection