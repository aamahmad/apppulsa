<option>--- Select State ---</option>
@if(!empty($products))
  @foreach($products as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif