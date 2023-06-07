
<?php
$therapyIngredientList = DB::table('medicine_equipment')->latest()->get();
?>

<div class="col-md-12">




    <table class="table table-bordered mt-3" id="dynamicAddRemove">
        <tr>
            <th>Ingredient Name</th>

        </tr>

            <td>
                <select class="form-select mb-3" name="mingrident_id[{{$m_id}}][]" aria-label="Default select example">
                    @foreach($therapyIngredientList as $allTherapyIngredients)
                    <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                    @endforeach
                </select>
            </td>



            <td>
                <button type="button" name="add" id="dynamic-ar"
                        class="btn btn-outline-primary">Add New Ingredient
                </button>
            </td>
        </tr>

    </table>

        </div>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="mingrident_id[{{$m_id}}][]" aria-label="Default select example">' +
            '@foreach($therapyIngredientList as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field345">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field345', function () {
        $(this).parents('tr').remove();
    });
</script>


