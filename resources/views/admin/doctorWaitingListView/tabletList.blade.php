<?php
$therapyIngredientList = DB::table('medicines')->latest()->get();
?>
<div class="row">
    <div class="col-md-12">
        <select class="form-select mb-3" name="tablet_name[{{$m_id}}][]" aria-label="Default select example">
            <option value=""> --Please Select -- </option>
            @foreach($therapyIngredientList as $allTherapyIngredients)
            <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
            @endforeach
        </select>
    </div>

</div>
