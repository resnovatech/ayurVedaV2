<div class="row">

    @foreach($patientTherapyList as $key=>$allPatientTherapyList)
    <?php

$therapyId = DB::table('therapy_lists')
        ->where('name', $allPatientTherapyList->name)->value('id');

$therapyDetailList = DB::table('patient_therapy_details')
        ->where('patient_therapy_id', $allPatientTherapyList->id)->get();
        $therapyName = DB::table('therapy_lists')
        ->where('id', $allPatientTherapyList->name)->value('name');
    ?>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Therapy Name: {{ $therapyName }}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <p class="text-muted">Add Ingredient</p>

                    <table class="table table-bordered" id="dynamicAddRemove{{ $allPatientTherapyList->id }}">
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Unit</th>
                        </tr>
                        @foreach($therapyDetailList as $mainkey=>$allTherapyDetailList)

                        <?php

$therapyDetailListName = DB::table('therapy_ingredients')
        ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

    ?>


                        <tr>
                            <td>

                                {{$therapyDetailListName}}

                                <input type="hidden" value="{{$allTherapyDetailList->ingredient_name}}" name="ingridient_name[]"
                                       class="form-control" required/>

                                       <input type="hidden" value="{{$allPatientTherapyList->name}}" name="therapy_id[]"
                                       class="form-control"/>


                            </td>
                            <td>
                                {{ $allTherapyDetailList->quantity }}
                                <input type="hidden" value="{{ $allTherapyDetailList->quantity }}" name="quantity[]"
                                       class="form-control" required/>
                            </td>



                            <td>
                                {{ $allTherapyDetailList->unit }}
                                <input type="hidden" value="{{ $allTherapyDetailList->unit }}" name="unit[]"
                                class="form-control" required/>

                            </td>

                        </tr>
                        @endforeach
                    </table>


                <!--end col-->
            </div>
        </div>
    </div>
    @endforeach

</div>
</div>

<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Therapy Appointment Date & Time</h4>
        </div><!-- end card header -->
        <div class="card-body">


                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Therapist</th>
                        <th>Therapy</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    @foreach($patientTherapyList as $allPatientTherapyList)
                    @for ($i = 0; $i < $allPatientTherapyList->amount ; $i++)
                    <tr>
                        <td>
                            <select class="form-select mb-3" required aria-label="Default select example" name="therapist[]">
                                @foreach($therapistList as $allTherapistList)
                                <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                                @endforeach

                            </select>
                            {{-- <span>ddd</span> --}}
                        </td>
                        <?php

$therapyName = DB::table('therapy_lists')
        ->where('id', $allPatientTherapyList->name)->value('name');

                        ?>
                        <td>

                            <input type="text" required   value="{{ $therapyName }}"
                                   class="form-control" readonly/>

                            <input type="hidden" required  name="therapy[]" value="{{ $allPatientTherapyList->name }}"
                                   class="form-control" readonly/>


                        </td>
                        <td>
                            <input type="date" required  name="date[]" value=""
                                   class="form-control"/>
                        </td>
                        <td>
                            <input type="time" required name="start_time[]" value=""
                                   class="form-control"/>
                        </td>
                        <td>
                            <input type="time" required name="end_time[]" value=""
                                   class="form-control"/>
                        </td>

                    </tr>
                    @endfor
                    @endforeach
                </table>

        </div>
    </div>
</div>
<!--end col-->
</div>


<div class="text-end mb-3">
<button type="submit" class="btn btn-primary w-sm" >Submit
</button>
</div>

<script type="text/javascript">
    var i = 0;
    $("[id^=dynamic-ar]").click(function () {

        var main_id = $(this).attr('id');
             var id_for_pass = main_id.slice(10);
        ++i;
        $("#dynamicAddRemove"+id_for_pass).append('<tr><td><input type="text"  name="ingridient_name[]"class="form-control" required/>  <input type="hidden" value="{{$allPatientTherapyList->name}}" name="therapy_id[]"class="form-control"/></td><td><input type="text" value="" name="ingridient_amount[]"class="form-control" required/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
