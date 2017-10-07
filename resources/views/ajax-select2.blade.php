@if(!empty($product_id))
  @foreach($states as $state)
    {{ $state->name }}
  @endforeach
@endif