<?php
$therapYListPackage = DB::table('therapy_lists')->whereIn('name',$therapyArrayList)->latest()->get();
$therapyIngredientList = DB::table('therapy_ingredients')->latest()->get();
?>

<div class="row">
@foreach($therapYListPackage as $j=>$allTherapyPackage)

<?php

$allDetail = DB::table('therapy_details')->where('therapy_list_id',$allTherapyPackage->id)->latest()->get();

?>

<div class="col-md-12">

    <p class="mt-3">Therapy Name: {{ $allTherapyPackage->name }}
        <input type="hidden" class="form-control" name="therapy_id[]" value="{{ $allTherapyPackage->id }}" >


<table class="table table-bordered mt-3 dynamicAddRemove" id="dynamicAddRemove{{ $j}}">
    <tr>
        <th>Ingredient Name</th>
        <th>Quantity</th>
        <th>Unit</th>
    </tr>
    @foreach($allDetail as $key=>$allGetIngredientData)
    <tr>
        <td>
            <select class="form-select mb-3" name="ingrident_id{{ $j }}[]" aria-label="Default select example">
                @foreach($therapyIngredientList as $allTherapyIngredients)
                <option value="{{ $allTherapyIngredients->id }}" {{ $allGetIngredientData->therapy_ingredient_id == $allTherapyIngredients->id ?  'selected':'' }}>{{ $allTherapyIngredients->name }}</option>
                @endforeach
            </select>
        </td>

        <td><input type="text" class="form-control" name="quantity{{ $j }}[]" value="{{ $allGetIngredientData->quantity }}" ></td>

        <td>
            <select class="form-select mb-3" name="unit{{ $j }}[]" aria-label="Default select example">
                <option value="gram" {{ 'gram' ==  $allGetIngredientData->unit ? 'selected':'' }}>gram</option>
                <option value="milligram" {{ 'milligram' ==  $allGetIngredientData->unit ? 'selected':'' }}>milligram</option>
                <option value="liter" {{ 'liter' ==  $allGetIngredientData->unit ? 'selected':'' }}>liter</option>
            </select>
        </td>

        <td>
            <button type="button" name="add" id="dynamic-ar{{ $j}}"
                    class="btn btn-outline-primary dynamic-ar">Add New Ingredient
            </button>
        </td>
    </tr>
    @endforeach
</table>

<?php
$therapistList = DB::table('therapists')->latest()->get();
?>

{{-- <h4 class="card-title mb-0 flex-grow-1">Therapy Appointment Date & Time</h4>

<input type="date" required  name="date[]" value=""
           class="form-control mt-2" id="checkData"/>

    <input type="time" required name="start_time[]" id="checkStartTime"
           class="form-control mt-2"/>

    <input type="time" required name="end_time[]" id="checkEndTime"
           class="form-control mt-2"/>


           <select class="form-select mt-3" id="therapist_id" required aria-label="Default select example" name="therapist_id[]">
            <option value="">--Please Select --</option>
                @foreach($therapistList as $allTherapistList)
                <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                @endforeach

            </select> --}}


</div>
@endforeach
</div>

<script type="text/javascript">
    var i = 0;
    $("[id^=dynamic-ar]").click(function () {

        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);


        ++i;
        $("#dynamicAddRemove"+id_for_pass).append('<tr id="mDelete'+i+'">' +
            '<td>' +
            ' <select class="form-select mb-3" name="ingrident_id'+id_for_pass+'[]" aria-label="Default select example">' +
            '@foreach($therapyIngredientList as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity'+id_for_pass+'[]"  class="form-control" /></td>' +
            '<td>' +
            ' <select class="form-select mb-3" name="unit'+id_for_pass+'[]" aria-label="Default select example">' +
            ' <option value="gram">gram</option><option value="milligram">milligram</option><option value="liter">liter</option></select>' +
            '</td>' +
            '<td><button type="button" id="remove-input-fieldd'+i+'" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '[id^=remove-input-fieldd]', function () {

var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(19);

//alert(id_for_pass);

$("#mDelete"+id_for_pass).remove();

//$(this).parents('tr').remove();
});
</script>
