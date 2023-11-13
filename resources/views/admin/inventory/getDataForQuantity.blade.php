@if(count($mainData) == 0)

  <input type="hidden"  name="getData" class="form-control" value="0" placeholder="Appointment Date" required>
@else
<hr>
<input type="hidden"  name="getData" class="form-control" value="1" placeholder="Appointment Date" required>

<div class="row">
    
              
@foreach($mainData as $convert_new_ass_cat)
<input type="hidden"  name="mainId[]" class="form-control" value="{{$convert_new_ass_cat->id}}" placeholder="Appointment Date" required>
<input type="hidden"  name="mainName[]" class="form-control" value="{{$convert_new_ass_cat->main_name}}" placeholder="Appointment Date" required>
<div class="col-md-4 mt-2">
    <label>Name</label>
    <input type="text"  name="updateName[]" class="form-control" value="{{$convert_new_ass_cat->name}}"  required>
    
</div>

<div class="col-md-4 mt-2">
    
    <label>Quantity</label>
        <input type="text"  name="updateQuantity[]" class="form-control"   required>
    
</div>


<div class="col-md-4 mt-2">
        <label>Unit</label>
                <select name ="updateUnit[]" class="form-control">
                                <option>--Select One --</option>

<option value="Gram">Gram</option>
<option value="Piece">Piece</option>
<option value="Ml">Ml</option>
<option value="Drops">Drops</option>
</select>
</div>
@endforeach
</div>
<hr>
@endif