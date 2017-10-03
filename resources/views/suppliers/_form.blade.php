<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
	{!! Form::label('name', 'Nama Sales/Perusahaan Distributor') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
	{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('no_telp') ? 'has-error' : '' !!}">
	{!! Form::label('no_telp', 'Nomor Telpon / HP') !!}
	{!! Form::text('no_telp', null, ['class'=>'form-control']) !!}
	{!! $errors->first('no_telp', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
	{!! Form::label('email', 'Email') !!}
	{!! Form::email('email', null, ['class'=>'form-control']) !!}
	{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
	{!! Form::label('alamat', 'Alamat') !!}
	{!! Form::text('alamat', null, ['class'=>'form-control']) !!}
	{!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}