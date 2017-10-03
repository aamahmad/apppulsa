<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
	{!! Form::label('name', 'Nama Pelanggan') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
	{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
	{!! Form::label('no_hp', 'Nomor HP') !!}
	{!! Form::text('no_hp', null, ['class'=>'form-control']) !!}
	{!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
</div>


{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}