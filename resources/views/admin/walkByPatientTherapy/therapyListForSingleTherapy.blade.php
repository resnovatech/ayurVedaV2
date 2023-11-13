
<?php
$therapyIngredientList = DB::table('therapy_ingredients')->latest()->get();
?>

<div class="col-md-12">

<table class="table table-bordered mt-3" id="dynamicAddRemove">
    <tr>
        <th>Ingredient Name</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Note</th>
    </tr>
    @foreach($getIngredientData as $allGetIngredientData)
    <tr>
        <td>
            <select class="form-select mb-3" name="ingrident_id[]" aria-label="Default select example">
                @foreach($therapyIngredientList as $allTherapyIngredients)
                <option value="{{ $allTherapyIngredients->id }}" {{ $allGetIngredientData->therapy_ingredient_id == $allTherapyIngredients->id ?  'selected':'' }}>{{ $allTherapyIngredients->name }}</option>
                @endforeach
            </select>
        </td>

        <td><input type="text" class="form-control" name="quantity[]" value="{{ $allGetIngredientData->quantity }}" ></td>

        <td>
            <select class="form-select mb-3" name="unit[]" aria-label="Default select example">
                <option value="gram" {{ 'gram' ==  $allGetIngredientData->unit ? 'selected':'' }}>gram</option>
                <option value="milligram" {{ 'milligram' ==  $allGetIngredientData->unit ? 'selected':'' }}>milligram</option>
                <option value="liter" {{ 'liter' ==  $allGetIngredientData->unit ? 'selected':'' }}>liter</option>
            </select>
        </td>
        
        <td><input type="text" class="form-control" name="snote[]" value="No Note Available" ></td>

        <td>
            <button type="button" name="add" id="dynamic-ar"
                    class="btn btn-outline-primary">Add New Ingredient
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

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="ingrident_id[]" aria-label="Default select example">' +
            '@foreach($therapyIngredientList as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity[]"  class="form-control" /></td>' +
            '<td>' +
            ' <select class="form-select mb-3" name="unit[]" aria-label="Default select example">' +
            ' <option value="gram">gram</option><option value="milligram">milligram</option><option value="liter">liter</option></select>' +
            '</td>' +
              '<td>' +
            '<input type="text" name="snote[]"  class="form-control" value="No Note Available" /></td>' +
            '<td>' +
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script>
$("#therapist_id").change(function () {

    var getMainId = $(this).val();

    alert(getMainId);

});
    </script>
