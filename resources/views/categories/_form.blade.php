<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
	{!! Form::label('name', 'Nama Kategori Produk') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
	{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{!! $errors->has('induk_id') ? 'has-error' : '' !!}">
	{!! Form::label('induk_id', 'Induk Kategori') !!}
	{!! Form::select('induk_id', ['0'=>'--jadikan induk kategori--']+App\Category::noInduk()->pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('induk_id', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}