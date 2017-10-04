<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
	{!! Form::label('name', 'Nama Produk') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
	{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('satuan') ? 'has-error' : '' !!}">
	{!! Form::label('satuan', 'Satuan') !!}
	{!! Form::text('satuan', null, ['class'=>'form-control']) !!}
	{!! $errors->first('satuan', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('harga_dasar') ? 'has-error' : '' !!}">
	{!! Form::label('harga_dasar', 'Harga Modal') !!}
	{!! Form::number('harga_dasar', null, ['class'=>'form-control']) !!}
	{!! $errors->first('harga_dasar', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('harga_jual') ? 'has-error' : '' !!}">
	{!! Form::label('harga_jual', 'Harga Jual') !!}
	{!! Form::number('harga_jual', null, ['class'=>'form-control']) !!}
	{!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{!! $errors->has('category_id') ? 'has-error' : '' !!}">
	{!! Form::label('category_id', 'Kategori Produk') !!}
	{!! Form::select('category_id', [''=>'']+App\Category::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>


{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}