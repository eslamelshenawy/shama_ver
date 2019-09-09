<option>--- Select sub cate ---</option>
@if(!empty($subcategory))
  @foreach($subcategory as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
  


  
@endif
