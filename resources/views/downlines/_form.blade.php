<div class="form-group">
  <label class="col-sm-2 control-label">Nama Pelanggan</label>
  <div class="col-sm-3">
    {!! Form::select('customer_id', [''=>'']+App\Customer::pluck('name','id')->all(), null, ['class'=>'form-control']) !!}
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('markup') ? ' has-error' : '' }}">
  {!! Form::label('markup', 'Markup', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::number('markup', null, ['class'=>'form-control']) !!}
    {!! $errors->first('markup', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
  {!! Form::label('nomor', 'Nomor', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('nomor', null, ['class'=>'form-control']) !!}
    {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group">
   <div class="col-md-4 col-md-offset-2">
      {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
  </div>
</div>
