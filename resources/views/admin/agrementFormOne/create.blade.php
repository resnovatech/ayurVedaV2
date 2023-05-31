@extends('admin.master.masterCreate')

@section('title')
Create Vaman Karma  | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Vaman Karma Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Vaman Karma</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">


                    <div class="card-body">
                        <form action="{{ route('agreementFormOne.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                        <div class="row">


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name ="name" class="form-control nameWiseData" id="searchnew" placeholder="Type Name/Phone/Patient ID" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Opd No</label>
                                <input type="text" name="opd_no" placeholder="Opd No" class="form-control" id="opd_no" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Age</label>
                                <input type="text" name ="age" class="form-control" id="age" placeholder="Age" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Gender</label>
                                <input type="text" name ="gender" class="form-control" id="gender" placeholder="Gender" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Diagnosis</label>
                                <input type="text" name ="diagnosis" class="form-control" id="" placeholder="Diagnosis" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Physician</label>
                                <input type="text" name ="physician" class="form-control" id="" placeholder="Physician" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Dos</label>
                                <input type="text" name ="dos" class="form-control" id="" placeholder="Dos" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Doc</label>
                                <input type="text" name ="doc" class="form-control" id="" placeholder="Doc" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Poorv Karma</label>
                                <input type="text" name ="poorv_karma" class="form-control" id="" placeholder="Poorv Karma" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Snehpanam</label>
                                <input type="text" name ="snehpanam" class="form-control" id="" placeholder="Snehpanam" required>
                            </div>

                            <div class="col-12 mb-2 ">
                                <center><h3>Vaman Karma</h3></center>
                                <div class="table-responsive mt-3">
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <thead class="bg-success">
                                        <tr>
                                          <th scope="col">Name Of Sneha</th>
                                          <th scope="col" colspan="8">Dosage & Duration</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td></td>

                                          <td>Day 1</td>
                                          <td>Day 2</td>
                                          <td>Day 3</td>
                                          <td>Day 4</td>
                                          <td>Day 5</td>
                                          <td>Day 6</td>
                                          <td>Day 7</td>
                                          <td>Remark</td>
                                          <td>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><input type="text" id="name_of_sneha0" name="name_of_sneha[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_one0" name="day_one[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_two0"  name="day_two[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_three0"  name="day_three[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_four0"  name="day_four[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_five0" name="day_five[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_six0" name="day_six[]" class="form-control" required/></td>
                                            <td><input type="text" id="day_seven0" name="day_seven[]" class="form-control" required/></td>
                                            <td><input type="text" id="remark0" name="remark[]" class="form-control" required/></td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add</button></td>
                                        </tr>
                                      </tbody>
                                  </table>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Diet On Day Before</label>
                                <input type="text" name ="diet_on_day_before" class="form-control" id="" placeholder="Diet On Day Before" required>
                            </div>



                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Pradhan Karma</label>
                                <input type="text" name ="pradhan_karma" class="form-control" id="" placeholder="Pradhan Karma" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Blood Pressure</label>
                                <input type="text" name ="blood_pressure" class="form-control" id="" placeholder="Blood Pressure" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Nadi</label>
                                <input type="text" name ="nadi" class="form-control" id="" placeholder="Nadi" required>
                            </div>



                            <div class="col-12 mb-2 ">
                                <center><h3>Vaman Yog</h3></center>

                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered" id="dynamicAddRemoveYog">
                                        <thead class="bg-success">
                                            <tr>
                                              <th scope="col">Name</th>
                                              <th scope="col">Time</th>
                                              <th scope="col">Quantity</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                                <td><select id="name_of_vaman_yog0" name="name_of_vaman_yog[]" class="form-control" required>
                                                    <option value="">---please select---</option>
                                                    <option value="Madhur Payash">Madhur Payash</option>
                                                    <option value="Kasheer Panam">Kasheer Panam</option>
                                                    <option value="Fanta Panam">Fanta Panam</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="vaman_yog_time0" name="vaman_yog_time[]" class="form-control" required/></td>
                                                <td><input type="text" id="vaman_yog_quantity0"  name="vaman_yog_quantity[]" class="form-control" required/></td>
                                              <td><button type="button" name="add" id="dynamic-ar-yog" class="btn btn-outline-primary">Add</button></td>


                                            </tr>

                                          </tbody>
                                      </table>
                                    </div>
                            </div>

                            <div class="col-12 mb-2 ">
                                <center><h3>Samyak Lakshana</h3></center>

                                <div class="row">

                                <div class="col-4 mb-2">
                                    <label for="" class="form-label">Vegaki</label>
                                    <textarea name ="samyak_lakshana_vegaki" class="form-control" id="" placeholder="Nadi" required>
                                    </textarea>
                                </div>

                                <div class="col-4 mb-2">
                                    <label for="" class="form-label">Manaki</label>
                                    <textarea name ="samyak_lakshana_manaki" class="form-control" id="" placeholder="manaki" required>
                                    </textarea>
                                </div>

                                <div class="col-4 mb-2">
                                    <label for="" class="form-label">Laingaki</label>
                                    <textarea name ="samyak_lakshana_laingaki" class="form-control" id="" placeholder="Laingaki" required>
                                    </textarea>
                                </div>
</div>

                            </div>


                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Laingaki</label>
                                <select  name="laingaki" class="form-control" required>
                                    <option value="">---please select---</option>
                                    <option value="Expulsion Of Vata">Expulsion Of Vata</option>
                                    <option value="Pitta">Pitta</option>
                                    <option value="Osud and Kapha Respectively">Osud and Kapha Respectively</option>
                                    <option value="Feeling Of Lightness In Heart">Feeling Of Lightness In Heart</option>
                                    <option value="Stomach And Head">Stomach And Head</option>
                                    </select>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Type Of Shodhanam</label>
                                <select  name="type_of_shodhanam" class="form-control" required>
                                    <option value="">---please select---</option>
                                    <option value="Pravara">Pravara</option>
                                    <option value="Madhyama">Madhyama</option>
                                    <option value="Avara">Avara</option>
                                    </select>
                            </div>


                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Samsarjana Krama</label>
                                <input type="text" name ="samsarjana_krama" class="form-control" id="" placeholder="Samsarjana Krama" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
$(".nameWiseData").keyup(function () {


    console.log(22);

});
</script>


<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" id="name_of_sneha'+i+'" name="name_of_sneha[]" class="form-control" required/></td><td><input type="text" id="day_one'+i+'" name="day_one[]" class="form-control" required/></td><td><input type="text" id="day_two'+i+'"  name="day_two[]" class="form-control" required/></td><td><input type="text" id="day_three'+i+'"  name="day_three[]" class="form-control" required/></td><td><input type="text" id="day_four'+i+'"  name="day_four[]" class="form-control" required/></td><td><input type="text" id="day_five'+i+'" name="day_five[]" class="form-control" required/></td><td><input type="text" id="day_six'+i+'" name="day_six[]" class="form-control" required/></td><td><input type="text" id="day_seven'+i+'" name="day_seven[]" class="form-control" required/></td><td><input type="text" id="remark'+i+'" name="remark[]" class="form-control" required/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar-yog").click(function () {
        ++i;
        $("#dynamicAddRemoveYog").append('<tr><td><select id="name_of_vaman_yog'+i+'" name="name_of_vaman_yog[]" class="form-control" required><option value="">---please select---</option><option value="Madhur Payash">Madhur Payash</option><option value="Kasheer Panam">Kasheer Panam</option><option value="Fanta Panam">Fanta Panam</option></select></td><td><input type="text" id="vaman_yog_time'+i+'" name="vaman_yog_time[]" class="form-control" required/></td><td><input type="text" id="vaman_yog_quantity'+i+'"  name="vaman_yog_quantity[]" class="form-control" required/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">




    $( "#searchnew" ).autocomplete({



        source: function( request, response ) {
          $.ajax({
            url: '{{ route("searchPatientFromVamanKarma") }}',
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#searchnew').val(ui.item.value);
           $('#opd_no').val(ui.item.label);
           $('#age').val(ui.item.age);
           $('#gender').val(ui.item.gender);
           console.log(ui.item);
           return false;
        }
      });

</script>


@endsection
