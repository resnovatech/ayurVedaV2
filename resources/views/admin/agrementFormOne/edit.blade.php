@extends('admin.master.masterCreate')

@section('title')
Edit Vaman Karma  | {{ $ins_name }}
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
                        <form action="{{ route('agreementFormOne.update',$agrementFormOneList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            @method('PUT')
                        <div class="row">


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name ="name" value="{{ $agrementFormOneList->name }}" class="form-control nameWiseData" id="searchnew" placeholder="Type Name/Phone/Patient ID" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Opd No</label>
                                <input type="text" name="opd_no" value="{{ $agrementFormOneList->opd_no }}" placeholder="Opd No" class="form-control" id="opd_no" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Age</label>
                                <input type="text" name ="age" value="{{ $agrementFormOneList->age }}" class="form-control" id="age" placeholder="Age" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Gender</label>
                                <input type="text" name ="gender" value="{{ $agrementFormOneList->gender }}" class="form-control" id="gender" placeholder="Gender" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Diagnosis</label>
                                <input type="text" value="{{ $agrementFormOneList->diagnosis }}" name ="diagnosis" class="form-control" id="" placeholder="Diagnosis" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Physician</label>
                                <input type="text" name ="physician" value="{{ $agrementFormOneList->physician }}" class="form-control" id="" placeholder="Physician" required>
                            </div>


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Dos</label>
                                <input type="text" name ="dos" value="{{ $agrementFormOneList->dos }}" class="form-control" id="" placeholder="Dos" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Doc</label>
                                <input type="text" name ="doc" value="{{ $agrementFormOneList->doc }}" class="form-control" id="" placeholder="Doc" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Poorv Karma</label>
                                <input type="text" name ="poorv_karma" value="{{ $agrementFormOneList->poorv_karma }}" class="form-control" id="" placeholder="Poorv Karma" required>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Snehpanam</label>
                                <input type="text" name ="snehpanam" value="{{ $agrementFormOneList->snehpanam }}" class="form-control" id="" placeholder="Snehpanam" required>
                            </div>

                            <?php $agrementFormOneList->agrement_form_one_sneha_lists ?>

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
                                        @foreach($agrementFormOneList->agrement_form_one_sneha_lists as $key=>$allKarmaList)
                                        @if($key == 0)
                                        <tr>
                                            <td><input type="text" value="{{ $allKarmaList->sneha_name }}" id="name_of_sneha{{ $key+500000 }}" name="name_of_sneha[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_one }}" id="day_one{{ $key+500000 }}" name="day_one[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_two }}" id="day_two{{ $key+500000 }}"  name="day_two[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_three }}" id="day_three{{ $key+500000 }}"  name="day_three[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_four }}"id="day_four{{ $key+500000 }}"  name="day_four[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_five }}" id="day_five{{ $key+500000 }}" name="day_five[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_six }}" id="day_six{{ $key+500000 }}" name="day_six[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_seven }}" id="day_seven{{ $key+500000 }}" name="day_seven[]" class="form-control" required/></td>
                                            <td><input type="text"value="{{ $allKarmaList->remark }}" id="remark{{ $key+500000 }}" name="remark[]" class="form-control" required/></td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add</button></td>
                                        </tr>
                                        @else
 <tr>
                                            <td><input type="text" value="{{ $allKarmaList->sneha_name }}" id="name_of_sneha{{ $key+500000 }}" name="name_of_sneha[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_one }}" id="day_one{{ $key+500000 }}" name="day_one[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_two }}" id="day_two{{ $key+500000 }}"  name="day_two[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_three }}" id="day_three{{ $key+500000 }}"  name="day_three[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_four }}"id="day_four{{ $key+500000 }}"  name="day_four[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_five }}" id="day_five{{ $key+500000 }}" name="day_five[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_six }}" id="day_six{{ $key+500000 }}" name="day_six[]" class="form-control" required/></td>
                                            <td><input type="text" value="{{ $allKarmaList->day_seven }}" id="day_seven{{ $key+500000 }}" name="day_seven[]" class="form-control" required/></td>
                                            <td><input type="text"value="{{ $allKarmaList->remark }}" id="remark{{ $key+500000 }}" name="remark[]" class="form-control" required/></td>
                                            <td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>
 </tr>

                                        @endif
                                        @endforeach
                                      </tbody>
                                  </table>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Diet On Day Before</label>
                                <input type="text" name ="diet_on_day_before" value="{{ $agrementFormOneList->diet_on_day_before }}" class="form-control" id="" placeholder="Diet On Day Before" required>
                            </div>



                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Pradhan Karma</label>
                                <input type="text" name ="pradhan_karma" value="{{ $agrementFormOneList->pradhan_karma }}" class="form-control" id="" placeholder="Pradhan Karma" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Blood Pressure</label>
                                <input type="text" name ="blood_pressure" value="{{ $agrementFormOneList->blood_pressure }}" class="form-control" id="" placeholder="Blood Pressure" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Nadi</label>
                                <input type="text" name ="nadi" value="{{ $agrementFormOneList->nadi }}" class="form-control" id="" placeholder="Nadi" required>
                            </div>



                            <div class="col-12 mb-2 ">
                                <center><h3>Vaman Yog</h3></center>
                                <?php $agrementFormOneList->vaman_yoga_lists ?>
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
                                            @foreach($agrementFormOneList->vaman_yoga_lists as $key=>$allYogaList)
                                            @if($key == 0 )
                                            <tr>
                                                <td><select id="name_of_vaman_yog{{ $key+60000 }}" name="name_of_vaman_yog[]" class="form-control" required>
                                                    <option value="">---please select---</option>
                                                    <option value="Madhur Payash" {{ 'Madhur Payash'== $allYogaList->yoga_name ? 'selected':'' }}>Madhur Payash</option>
                                                    <option value="Kasheer Panam" {{ 'Kasheer Panam'== $allYogaList->yoga_name ? 'selected':'' }}>Kasheer Panam</option>
                                                    <option value="Fanta Panam" {{ 'Fanta Panam'== $allYogaList->yoga_name ? 'selected':'' }}>Fanta Panam</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="vaman_yog_time{{ $key+60000 }}" value="{{ $allYogaList->time }}" name="vaman_yog_time[]" class="form-control" required/></td>
                                                <td><input type="text" id="vaman_yog_quantity{{ $key+60000 }}" value="{{$allYogaList->quantity }}"  name="vaman_yog_quantity[]" class="form-control" required/></td>
                                              <td><button type="button" name="add" id="dynamic-ar-yog" class="btn btn-outline-primary">Add</button></td>


                                            </tr>
                                            @else
                                            <tr>
                                                <td><select id="name_of_vaman_yog{{ $key+60000 }}" name="name_of_vaman_yog[]" class="form-control" required>
                                                    <option value="">---please select---</option>
                                                    <option value="Madhur Payash" {{ 'Madhur Payash'== $allYogaList->yoga_name ? 'selected':'' }}>Madhur Payash</option>
                                                    <option value="Kasheer Panam" {{ 'Kasheer Panam'== $allYogaList->yoga_name ? 'selected':'' }}>Kasheer Panam</option>
                                                    <option value="Fanta Panam" {{ 'Fanta Panam'== $allYogaList->yoga_name ? 'selected':'' }}>Fanta Panam</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="vaman_yog_time{{ $key+60000 }}" value="{{ $allYogaList->time }}" name="vaman_yog_time[]" class="form-control" required/></td>
                                                <td><input type="text" id="vaman_yog_quantity{{ $key+60000 }}" value="{{$allYogaList->quantity }}"  name="vaman_yog_quantity[]" class="form-control" required/></td>
                                              <td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>


                                            </tr>

                                            @endif
                                            @endforeach

                                          </tbody>
                                      </table>
                                    </div>
                            </div>

                            <div class="col-12 mb-2 ">
                                <center><h3>Samyak Lakshana</h3></center>

                                <div class="row">

                                <div class="col-4 mb-2">
                                    <label for="" class="form-label">Vegaki</label>
                                    <textarea name ="samyak_lakshana_vegaki"  class="form-control" id="" placeholder="Nadi" required>
                                      {{ $agrementFormOneList->samyak_lakshana_vegaki }}
                                    </textarea>
                                </div>

                                <div class="col-4 mb-2">
                                    <label for="" class="form-label">Manaki</label>
                                    <textarea name ="samyak_lakshana_manaki"  class="form-control" id="" placeholder="manaki" required>
                                        {{ $agrementFormOneList->samyak_lakshana_manaki }}
                                    </textarea>
                                </div>

                                <div class="col-4 mb-2">
                                    <label for="" class="form-label">Laingaki</label>
                                    <textarea name ="samyak_lakshana_laingaki"  class="form-control" id="" placeholder="Laingaki" required>

                                        {{ $agrementFormOneList->samyak_lakshana_laingaki }}
                                    </textarea>
                                </div>
</div>

                            </div>


                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Laingaki</label>
                                <select  name="laingaki" class="form-control" required>
                                    <option value="">---please select---</option>
                                    <option value="Expulsion Of Vata" {{ 'Expulsion Of Vata' == $agrementFormOneList->laingaki ? 'selected':'' }}>Expulsion Of Vata</option>
                                    <option value="Pitta" {{ 'Pitta' == $agrementFormOneList->laingaki ? 'selected':'' }}>Pitta</option>
                                    <option value="Osud and Kapha Respectively" {{ 'Osud and Kapha Respectively' == $agrementFormOneList->laingaki ? 'selected':'' }}>Osud and Kapha Respectively</option>
                                    <option value="Feeling Of Lightness In Heart" {{ 'Feeling Of Lightness In Heart' == $agrementFormOneList->laingaki ? 'selected':'' }}>Feeling Of Lightness In Heart</option>
                                    <option value="Stomach And Head" {{ 'Stomach And Head' == $agrementFormOneList->laingaki ? 'selected':'' }}>Stomach And Head</option>
                                    </select>
                            </div>

                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Type Of Shodhanam</label>
                                <select  name="type_of_shodhanam" class="form-control" required>
                                    <option value="">---please select---</option>
                                    <option value="Pravara" {{ 'Pravara' == $agrementFormOneList->type_of_shodhanam ? 'selected':'' }}>Pravara</option>
                                    <option value="Madhyama" {{ 'Madhyama' == $agrementFormOneList->type_of_shodhanam ? 'selected':'' }}>Madhyama</option>
                                    <option value="Avara" {{ 'Avara' == $agrementFormOneList->type_of_shodhanam ? 'selected':'' }}>Avara</option>
                                    </select>
                            </div>


                            <div class="col-4 mb-2">
                                <label for="" class="form-label">Samsarjana Krama</label>
                                <input type="text" name ="samsarjana_krama" value="{{ $agrementFormOneList->samsarjana_krama }}" class="form-control" id="" placeholder="Samsarjana Krama" required>
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
