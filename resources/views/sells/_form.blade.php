<div class="form-group">
  <label class="col-sm-2 control-label">Nama Pelanggan</label>
  <div class="col-sm-3">
    {!! Form::select('customer_id', [''=>'']+App\Customer::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>
  
<div class="form-group">
  <label class="col-sm-2 control-label">Produk</label>
  <div class="col-sm-2">
    <select style="width: 200px" class="form-control productcategory">
        <option value="0" disabled="true" selected="true" name="category_id">--Kategori Produk--</option>
        @foreach($prod as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    <select style="width: 200px" class="form-control productname" name="product_id">
        <option value="0" disabled="true" selected="true">--Nama Produk--</option>
    </select>
    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    
    <label class="col-sm-3 control-label">Harga</label>
    <input class="harga_dasar form-control" type="text" value="Harga Modal" disabled>
    <input class="harga_dasar form-control" name="harga_awal" type="hidden" value="Harga Modal">
    {!! $errors->first('harga_awal', '<p class="help-block">:message</p>') !!}
    
    <input class="harga_jual form-control" type="text" value="Harga Jual" disabled>
    <input class="harga_jual form-control" name="harga_retail" type="hidden" value="Harga Jual">
    {!! $errors->first('harga_retail', '<p class="help-block">:message</p>') !!}
    
    <label class="col-sm-3 control-label">Qty</label>
    {!! Form::number('qty', null, ['class'=>'form-control qty']) !!}
    {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}

    <label class="col-sm-4 control-label">Subtotal</label>
    <input class="amount form-control" name="sub_total" type="text">
    {!! $errors->first('sub_total', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('tgl') ? ' has-error' : '' }}">
  {!! Form::label('tgl', 'Tanggal', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
      <input type="text" class="form-control qty" name="tgl" value="" id="dp1" >
      {!! $errors->first('tgl', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
   <div class="col-md-4 col-md-offset-2">
      {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
  </div>
</div>

    