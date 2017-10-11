<div class="form-group{{ $errors->has('tgl') ? ' has-error' : '' }}">
  {!! Form::label('tgl', 'Tgl. Transaksi', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
      <input type="text" class="form-control qty" name="tgl" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="dp1" >
      {!! $errors->first('tgl', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Nama Pelanggan</label>
  <div class="col-sm-3">
    {!! Form::select('customer_id', ['0'=>'-- Cari Pelanggan --']+App\Customer::pluck('name','id')->all(), null, ['class'=>'form-control js-selectize']) !!}
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>
  
<div class="form-group">
  <label class="col-sm-2 control-label">Produk</label>
  <div class="col-sm-3">
    <select style="width: 200px" class="form-control productcategory js-selectize">
        <option value="0" disabled="true" selected="true" name="category_id">--Kategori Produk--</option>
        @foreach($prod as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    <select style="width: 200px" class="form-control productname" name="product_id">
        <option value="0" disabled="true" selected="true">--Nama Produk--</option>
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    
    <table>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>

    
   
    <input class="harga_dasar form-control" name="harga_awal" type="hidden" value="Harga Modal">
    {!! $errors->first('harga_awal', '<p class="help-block">:message</p>') !!}
    
    
    <input class="harga_jual form-control" name="harga_retail" type="hidden" value="Harga Jual">
    {!! $errors->first('harga_retail', '<p class="help-block">:message</p>') !!}
    
   

    <table>
      <tr>
        <td>Harga Modal</td>
        <td>Harga Retail</td>
      </tr>
      <tr>
        <td><input class="harga_dasar form-control" type="text" value="Harga Modal" disabled></td>
        <td><input class="harga_jual form-control" type="text" value="Harga Jual" disabled></td>
        <td></td>
      </tr>
    </table>

      <label class="col-sm-2 control-label">Qty</label>
      {!! Form::number('qty', null, ['class'=>'form-control qty']) !!}
      {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
  
      <label class="col-sm-2 control-label">Subtotal</label>
      <input class="amount form-control" name="sub_total" type="hidden">
      <input class="amount form-control" name="sub_total" type="text" disabled>
      {!! $errors->first('sub_total', '<p class="help-block">:message</p>') !!}

  </div>
</div>

<div class="form-group{{ $errors->has('ket1') ? ' has-error' : '' }}">
  {!! Form::label('ket1', 'Keterangan 1', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-3">
      <input type="text" class="form-control" name="ket1" value="" >
      {!! $errors->first('ket1', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('ket2') ? ' has-error' : '' }}">
  {!! Form::label('ket2', 'Keterangan 2', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
      <input type="text" class="form-control" name="ket2" value="" >
      {!! $errors->first('ket2', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('isLunas') ? ' has-error' : '' }}">
  {!! Form::label('isLunas', 'Status pembayaran', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
      <div class="checkbox">
        <label><input name="isLunas" type="checkbox" value="1">Lunas</label>
      </div>
  </div>
</div>
  
<div class="form-group">
   <div class="col-md-4 col-md-offset-2">
      {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
  </div>
</div>

    