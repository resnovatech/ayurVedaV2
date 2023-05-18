<table class="display table table-bordered" style="width:100%">
    <thead >
    <tr>

        <th>Therapy Name</th>
        <th>Therapy Ingridents</th>
        <th >Days</th>
        <th >Time Of The Day</th>

    </tr>
    </thead>
    <tbody >

        @foreach($getAllTheTherapy as $getAllTheTherapyList)
        @for ($i = 0; $i < $getAllTheTherapyList->amount; $i++)
        <tr>
            <td>{{ $getAllTheTherapyList->name }}</td>
            <td>
<?php

$ingredientList = DB::table('therapy_lists')->where('name',$getAllTheTherapyList->name)->value('id');
$mainId = DB::table('therapy_details')->where('therapy_list_id',$ingredientList)->get();


$convert_name_title = $mainId->implode("therapy_ingredient_id", " ");
$separated_data_title = explode(" ", $convert_name_title);

$listOfIngredients = DB::table('therapy_ingredients')->whereIn('id',$separated_data_title)->get();


?>

@foreach($listOfIngredients as $allListOfIngredients)

{{ $allListOfIngredients->name }}
<input type="hidden" value="{{ $getAllTheTherapyList->name }}" name="therapy_id[]"  class="form-control" />
@endforeach


            </td>
            <td>

                <input type="text"  name="main_day[]"  class="form-control" />
                <input type="hidden" value="{{ $getAllTheTherapyList->patient_id }}" name="patient_id[]"  class="form-control" />
            </td>
            <td> <select class="form-select mb-3" required  aria-label="Default select example" name="time_of_the_day[]">
                <option value="After Food">After Food</option>
                <option value="Before Food">Before Food</option>
                <option value="With Food">With Food</option>
            </select></td>

        </tr>
       @endfor
       @endforeach


    </tbody>
</table>
