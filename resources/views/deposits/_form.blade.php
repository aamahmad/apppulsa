<div class="form-group{!! $errors->has('supplier_id') ? 'has-error' : '' !!}">
	{!! Form::label('supplier_id', 'Sales Distributor') !!}
	{!! Form::select('supplier_id', [''=>'']+App\Supplier::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('supplier_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{!! $errors->has('category_id') ? 'has-error' : '' !!}">
	{!! Form::label('category_id', 'Kategori Produk') !!}
	{!! Form::select('category_id', [''=>'']+App\Category::where('induk_id',1)->pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('jumlah') ? 'has-error' : '' !!}">
	{!! Form::label('jumlah', 'Jumlah') !!}
	{!! Form::number('jumlah', null, ['class'=>'form-control']) !!}
	{!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('tgl_beli') ? 'has-error' : '' !!}">
	{!! Form::label('tgl_beli', 'Tanggal Order') !!}
	{!! Form::text('tgl_beli', null, ['class'=>'form-control']) !!}
	{!! $errors->first('tgl_beli', '<p class="help-block">:message</p>') !!}
</div>


{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}