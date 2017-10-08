<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('supplier_id', 'Sales/Distributor', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::select('supplier_id', [''=>'']+App\Supplier::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('supplier_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('supplier_id', 'Prodduk', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
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
  </div>
</div>

<div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
  {!! Form::label('jumlah', 'Jumlah Stok', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::number('jumlah', null, ['class'=>'form-control']) !!}
    {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('tgl_beli') ? ' has-error' : '' }}">
  {!! Form::label('tgl_beli', 'Tgl. Order', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('tgl_beli', null, ['class'=>'form-control']) !!}
	{!! $errors->first('tgl_beli', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
   <div class="col-md-4 col-md-offset-2">
      {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
