<?php

$packages =DB::table('packages')->where('id',$mainId)->first();

$convert_new_ass_cat  = explode(",",$packages->powder_id);

$powderAmount  = explode(",",$packages->powder_amount);
$therapyIngredientList = DB::table('medicines')->latest()->get();

$medicineEquipmentList = DB::table('medicine_equipment')->latest()->get();

?>
<div class="row">
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
          <tr>

            <th scope="col">Tablet/Medicine Name</th>
            <th scope="col">Ingredient Name</th>
            <th scope="col">Quantity</th>
           {{--  <th scope="col">Unit</th> --}}
          </tr>
        </thead>
        <tbody>
@for ($i = 0; $i < count($convert_new_ass_cat); ++$i)

@if($convert_new_ass_cat[$i] ==  'Tablet')

@for ($j = 0; $j < $powderAmount[$i]; ++$j)


<tr>


    <td>
        <label>Tablet Name</label>
        <select class="form-select " required name="tablet_name[]" aria-label="Default select example">
            <option value=""> --Please Select -- </option>
            @foreach($therapyIngredientList as $allTherapyIngredients)
            <option value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>
            @endforeach
        </select>
    </td>
    <td></td>
    <td>
        <label>Tablet Quantity</label>
        <input type="text" required class="form-control" id="hquantity0" required name="hquantity[]">
    </td>
    {{-- <td></td> --}}
    </tr>

@endfor



@else

@for ($k = 0; $k < $powderAmount[$i]; ++$k)
<tr>
<td>
    <label>Medicine Name</label>
    <input type="text" required class="form-control" required id="medicineName{{$k+1+5000}}" name="medicinename[]">
</td>
<td>
    <table class="table table-bordered mt-3" id="dynamicAddRemove{{$k}}">
        <tr>
            <th>Ingredient Name</th>
            <th>Quantity</th>
            <th>Unit</th>
        </tr id="mainDiv{{$k}}">

            <td>
                <select class="form-select mb-3" required name="mingrident_id{{$k}}[]" aria-label="Default select example">
                    @foreach($medicineEquipmentList as $allTherapyIngredients)
                    <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                    @endforeach
                </select>
            </td>

            <td>

                <input type="text" required class="form-control" id="mquantity{{$k+1+5000}}" name="mquantity{{$k}}[]" required>
            </td>

            <td>

                <input type="text" required class="form-control" id="munit{{$k+1+5000}}" name="munit{{$k}}[]" required>
            </td>

            <td>
                <button type="button" name="add" id="dynamic-ar{{$k}}"
                        class="btn btn-outline-primary">Add New Ingredient
                </button>
            </td>
        </tr>

    </table>

</td>
<td> <label>Medicine Quantity</label>
    <input type="text" required class="form-control" required id="mmquantity{{$k+1+5000}}" name="mmquantity[]"/></td>
{{-- <td></td> --}}
</tr>
@endfor




@endif


@endfor
</tbody>
</table>
</div>
    </div>
    <script type="text/javascript">
        var i = 0;
        $("[id^=dynamic-ar]").click(function () {
            var main_id = $(this).attr('id');
    var id_for_pass = main_id.slice(10);
            ++i;
            $("#dynamicAddRemove"+id_for_pass).append('<tr id="mainDiv'+i+id_for_pass+'">' +
                '<td>' +
                ' <select class="form-select herb_type mb-3" id="mingrident_id'+i+'"  name="mingrident_id'+id_for_pass+'[]" required aria-label="Default select example">' +
                '<option value="">--- Please Select ---</option>@foreach($medicineEquipmentList as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach' +
                '</td>' +

                '<td>' +
                '<input type="text" required class="form-control" id="mquantity'+i+'" name="mquantity'+id_for_pass+'[]" required></td>' +
                '<td>'+
                '<input type="text" required class="form-control" id="munit'+i+'" name="munit'+id_for_pass+'[]" required>'+

                '</td>'+
                '<td><button type="button" id="finalD'+i+id_for_pass+'" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '[id^=finalD]', function () {
            var main_idd = $(this).attr('id');
    var id_for_passd = main_idd.slice(6);
            $('#mainDiv'+id_for_passd).remove();
        });
    </script>
