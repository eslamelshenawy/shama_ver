<option>--- Select Category ---</option>
@if(!empty($product))
  @foreach($product as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
  


  
@endif
