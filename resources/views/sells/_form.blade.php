<div class="form-group{!! $errors->has('customer_id') ? 'has-error' : '' !!}">
	{!! Form::label('customer_id', 'Pelanggan') !!}
	{!! Form::select('customer_id', [''=>'']+App\Customer::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{!! $errors->has('product_id') ? 'has-error' : '' !!}">
	{!! Form::label('product_id', 'Nama Produk') !!}
	{!! Form::select('product_id', [''=>'']+App\Product::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
	{!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {!! $errors->has('qty') ? 'has-error' : '' !!}">
	{!! Form::label('qty', 'Qty') !!}
	{!! Form::number('qty', null, ['class'=>'form-control']) !!}
	{!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
</div>



{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}