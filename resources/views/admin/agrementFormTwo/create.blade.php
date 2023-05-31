@extends('admin.master.masterCreate')

@section('title')
Create Panchkarma  | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Panchkarma Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Panchkarma</li>
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
                        <form action="{{ route('agreementFormTwo.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                        <div class="row">


                            <div class="col-6 mb-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name ="name" class="form-control nameWiseData" id="search" placeholder="Type Name/Phone/Patient ID" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Opd No</label>
                                <input type="text" name="opd_no" placeholder="Opd No" class="form-control" id="opd_no" required>
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

    //alert(22);
    console.log(22);

});
</script>


<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" id="name_of_sneha'+i+'" name="name_of_sneha[]" class="form-control"/></td><td><input type="text" id="day_one'+i+'" name="day_one[]" class="form-control"/></td><td><input type="text" id="day_two'+i+'"  name="day_two[]" class="form-control"/></td><td><input type="text" id="day_three'+i+'"  name="day_three[]" class="form-control"/></td><td><input type="text" id="day_four'+i+'"  name="day_four[]" class="form-control"/></td><td><input type="text" id="day_five'+i+'" name="day_five[]" class="form-control"/></td><td><input type="text" id="day_six'+i+'" name="day_six[]" class="form-control"/></td><td><input type="text" id="day_seven'+i+'" name="day_seven[]" class="form-control"/></td><td><input type="text" id="remark'+i+'" name="remark[]" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar-yog").click(function () {
        ++i;
        $("#dynamicAddRemoveYog").append('<tr><td><select id="name_of_vaman_yog'+i+'" name="name_of_vaman_yog[]" class="form-control"><option value="">---please select---</option><option value="Madhur Payash">Madhur Payash</option><option value="Kasheer Panam">Kasheer Panam</option><option value="Fanta Panam">Fanta Panam</option></select></td><td><input type="text" id="vaman_yog_time'+i+'" name="vaman_yog_time[]" class="form-control"/></td><td><input type="text" id="vaman_yog_quantity'+i+'"  name="vaman_yog_quantity[]" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">


    $( "#search" ).autocomplete({
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
           $('#search').val(ui.item.value);
           $('#opd_no').val(ui.item.label);
           $('#age').val(ui.item.age);
           $('#gender').val(ui.item.gender);
           console.log(ui.item);
           return false;
        }
      });

</script>


@endsection
