<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  {!! Form::label('name', 'Nama Produk', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'contoh : AS5, V5, Kartu perdana, Voucher , dll']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
  {!! Form::label('jenis', 'Jenis Produk', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('jenis', null, ['class'=>'form-control', 'placeholder'=>'pulsa / kuota / pln, dll']) !!}
    {!! $errors->first('jenis', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('harga_dasar') ? ' has-error' : '' }}">
  {!! Form::label('harga_dasar', 'Harga Modal', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::number('harga_dasar', null, ['class'=>'form-control', 'placeholder'=>'harga modal / dasar']) !!}
    {!! $errors->first('harga_dasar', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('harga_jual') ? ' has-error' : '' }}">
  {!! Form::label('harga_jual', 'Harga Jual', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::number('harga_jual', null, ['class'=>'form-control', 'placeholder'=>'harga jual / eceran']) !!}
    {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
  {!! Form::label('category_id', 'Kategori', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::select('category_id', [''=>'']+App\Category::where('induk_id', '!=', 0)->pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
  </div>
</div>



