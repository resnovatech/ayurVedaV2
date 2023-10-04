<div class="row">

<div class="col-md-3">
  <h6>therapy List</h6>

  <table class="display table table-bordered" style="width:100%">
    <thead >
    <tr>

        <th>Therapy Name</th>
        <th>Quantity</th>
    </tr>
    </thead>
    <tbody >
        @foreach($getAllTheTherapy as $getAllTheTherapyList)
        <tr>

            <td>
<?php
$therapyName = DB::table('therapy_lists')->where('id',$getAllTheTherapyList->name)->value('name');

    ?>
{{ $therapyName }}

            </td>
            <td>{{ $getAllTheTherapyList->amount }}</td>
        </tr>
        @endforeach
    </tbody>

  </table>

</div>


<div class="col-md-3">
    <h6>Face Pack List</h6>

    <table class="display table table-bordered" style="width:100%">
        <thead >
        <tr>

            <th>Face Pack Name</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody >
            @foreach($getAllFacePack as $getAllTheTherapyList)
            <tr>

                <td>
    <?php
    $pack_name = DB::table('face_packs')->where('id',$getAllTheTherapyList->face_pack_id)->value('pack_name');

        ?>
    {{ $pack_name }}

                </td>
                <td>{{ $getAllTheTherapyList->quantity }}</td>
            </tr>
            @endforeach
        </tbody>

      </table>

</div>



<div class="col-md-3">
    <h6>Herb List</h6>

    <table class="display table table-bordered" style="width:100%">
        <thead >
        <tr>
            <th>Package Name</th>
            <th>Medicine/Tablet Name</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody >
            @foreach($getAllPatientHerb as $getAllTheTherapyList)
            <tr>

                <td>
    <?php
    $pack_name = DB::table('packages')->where('id',$getAllTheTherapyList->package_name)->value('name');

        ?>
    {{ $pack_name }}

                </td>
                <td>{{ $getAllTheTherapyList->name }}</td>
                <td>{{ $getAllTheTherapyList->how_many_dose }}</td>
            </tr>
            @endforeach
        </tbody>

      </table>

</div>


<div class="col-md-3">
    <h6>Medical Supliment List</h6>


    <table class="display table table-bordered" style="width:100%">
        <thead >
        <tr>

            <th>Medical Supliment Name</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody >
            @foreach($getAllPatientMedicalSupplement as $getAllTheTherapyList)
            <tr>

                <td>
                    {{ $getAllTheTherapyList->name }}

                </td>
                <td>{{ $getAllTheTherapyList->quantity }}</td>
            </tr>
            @endforeach
        </tbody>

      </table>

</div>




</div>




<hr style="border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 22px 0 21px; height: 0;">





<table class="display table table-bordered" style="width:100%">
    <thead >
    <tr>
        <th>Date</th>
        <th>Therapy Name</th>

        <th >Time Of The Day</th>
        <th >Therapist</th>
    </tr>
    </thead>
    <tbody >

        @foreach($getAllTheTherapy as $getAllTheTherapyList)
        @for ($i = 0; $i < $getAllTheTherapyList->amount; $i++)
        <tr>
            <td>
                <input type="date"  name="appointment_date[]" class="form-control" id="datepicker" placeholder="Appointment Date" required>
            </td>
            <td>

                <?php
                $therapyName = DB::table('therapy_lists')->where('id',$getAllTheTherapyList->name)->value('name');

                    ?>
                {{ $therapyName }}


                <input type="hidden" value="{{ $getAllTheTherapyList->name }}" name="therapy_id[]"  class="form-control" />


            </td>


            <td> <select class="form-select mb-3" required  aria-label="Default select example" name="time_of_the_day[]">
                <option value="After Food">After Food</option>
                <option value="Before Food">Before Food</option>
                <option value="With Food">With Food</option>
            </select></td>

            <td>

                <select class="form-select mb-3" required aria-label="Default select example" name="therapist[]">
                    @foreach($therapistList as $allTherapistList)
                    <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                    @endforeach

                </select>
                <input type="hidden" value="{{ $getAllTheTherapyList->patient_id }}" name="patient_id[]"  class="form-control" />

                <input type="hidden" value="therapy" name="status[]"  class="form-control" />
            </td>

        </tr>
       @endfor
       @endforeach




    </tbody>
</table>


<table class="display table table-bordered" style="width:100%">
    <thead >
    <tr>
        <th>Date</th>
        <th>Face Pack Name</th>
        <th >Time Of The Day</th>
        <th >Therapist</th>
    </tr>
    </thead>
    <tbody >
        @foreach($getAllFacePack as $getAllTheTherapyList)
        @for ($i = 0; $i < $getAllTheTherapyList->quantity; $i++)
        <tr>

            <td>
                <input type="date"  name="appointment_date[]" class="form-control" id="datepicker" placeholder="Appointment Date" required>
            </td>

            <td>
<?php
$pack_name = DB::table('face_packs')->where('id',$getAllTheTherapyList->face_pack_id)->value('pack_name');

    ?>
{{ $pack_name }}

<input type="hidden" value="{{ $getAllTheTherapyList->face_pack_id }}" name="therapy_id[]"  class="form-control" />

            </td>
            <td> <select class="form-select mb-3" required  aria-label="Default select example" name="time_of_the_day[]">
                <option value="After Food">After Food</option>
                <option value="Before Food">Before Food</option>
                <option value="With Food">With Food</option>
            </select></td>

            <td>

                <select class="form-select mb-3" required aria-label="Default select example" name="therapist[]">
                    @foreach($therapistList as $allTherapistList)
                    <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                    @endforeach

                </select>
                <input type="hidden" value="{{ $registerId }}" name="patient_id[]"  class="form-control" />

                <input type="hidden" value="facepack" name="status[]"  class="form-control" />
            </td>
        </tr>
        @endfor
        @endforeach
    </tbody>

  </table>



  <table class="display table table-bordered" style="width:100%">
    <thead >
    <tr>
        <th>Date</th>
        <th>Package Name</th>
        <th>Medicine/Tablet Name</th>
        <th >Time Of The Day</th>
        <th >Therapist</th>
    </tr>
    </thead>
    <tbody >
        @foreach($getAllPatientHerb as $getAllTheTherapyList)
        @for ($i = 0; $i < $getAllTheTherapyList->how_many_dose; $i++)
        <tr>
            <td>
                <input type="date"  name="appointment_date[]" class="form-control" id="datepicker" placeholder="Appointment Date" required>
            </td>
            <td>
<?php
$pack_name = DB::table('packages')->where('id',$getAllTheTherapyList->package_name)->value('name');

    ?>
{{ $pack_name }}

            </td>
            <td>

                {{ $getAllTheTherapyList->name }}

                <input type="hidden" value="{{ $getAllTheTherapyList->name }}" name="therapy_id[]"  class="form-control" />

            </td>
            <td> <select class="form-select mb-3" required  aria-label="Default select example" name="time_of_the_day[]">
                <option value="After Food">After Food</option>
                <option value="Before Food">Before Food</option>
                <option value="With Food">With Food</option>
            </select></td>

            <td>

                <select class="form-select mb-3" required aria-label="Default select example" name="therapist[]">
                    @foreach($therapistList as $allTherapistList)
                    <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                    @endforeach

                </select>
                <input type="hidden" value="{{ $getAllTheTherapyList->patient_id }}" name="patient_id[]"  class="form-control" />

                <input type="hidden" value="herb" name="status[]"  class="form-control" />
            </td>
        </tr>
        @endfor
        @endforeach
    </tbody>

  </table>



  <table class="display table table-bordered" style="width:100%">
    <thead >
    <tr>
        <th>Date</th>
        <th>Medical Supliment Name</th>
        <th >Time Of The Day</th>
        <th >Therapist</th>
    </tr>
    </thead>
    <tbody >
        @foreach($getAllPatientMedicalSupplement as $getAllTheTherapyList)
        <tr>
            <td>
                <input type="date"  name="appointment_date[]" class="form-control" id="datepicker" placeholder="Appointment Date" required>
            </td>
            <td>
                {{ $getAllTheTherapyList->name }}

                <input type="hidden" value="{{ $getAllTheTherapyList->name }}" name="therapy_id[]"  class="form-control" />

            </td>
            <td> <select class="form-select mb-3" required  aria-label="Default select example" name="time_of_the_day[]">
                <option value="After Food">After Food</option>
                <option value="Before Food">Before Food</option>
                <option value="With Food">With Food</option>
            </select></td>

            <td>

                <select class="form-select mb-3" required aria-label="Default select example" name="therapist[]">
                    @foreach($therapistList as $allTherapistList)
                    <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                    @endforeach

                </select>
                <input type="hidden" value="{{ $getAllTheTherapyList->patient_id }}" name="patient_id[]"  class="form-control" />

                <input type="hidden" value="medical" name="status[]"  class="form-control" />
            </td>
        </tr>
        @endforeach
    </tbody>

  </table>
