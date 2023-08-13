@extends('admin.master.master')
@section('title')
Face Pack Appointment | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Face Pack Appointment</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Face Pack Appointment</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form action="{{ route('facePackAppoinment.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf
        <input type="hidden" name="patient_type" id="ptypestore" />
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Basic Information</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                <label for="" class="form-label">Name</label>
                                <input type="hidden" name ="patient_id" class="form-control" id="patient_id" placeholder="Name" required>
                                <input type="text" name ="name" class="form-control nameWiseData" id="searchnew" placeholder="Type Name/Phone/Patient ID" required>
                                </div>

                                {{-- <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="" class="form-label">Patient ID</label>
                                        <select class="js-example-basic-single form-control" name="patient_id" id="patient_id" required>
                                        <option >--Please Select-----</option>
                                        @foreach($walkByPatientList as $allPatientList)
                                        <option value="{{ $allPatientList->patient_reg_id }}" data-name="{{ $allPatientList->name }}" data-ptype="Walk By Patient"
                                        data-age="{{ $allPatientList->age }}"
                                        data-gender="{{ $allPatientList->gender }}"
                                        data-address="{{ $allPatientList->address }}"
                                        data-emailaddress="{{ $allPatientList->email_address }}"
                                        data-phonenumber="{{ $allPatientList->phone_or_mobile_number }}"
                                        data-nidnumber="{{ $allPatientList->nid_number }}"
                                        data-nationality="{{ $allPatientList->nationality }}"
                                        >{{ $allPatientList->patient_reg_id }}</option>
                                                                             @endforeach

                                        @foreach($patientList as $allPatientList)
<option value="{{ $allPatientList->patient_id }}" data-name="{{ $allPatientList->name }}" data-ptype="Patient"
data-age="{{ $allPatientList->age }}"
data-gender="{{ $allPatientList->gender }}"
data-address="{{ $allPatientList->address }}"
data-emailaddress="{{ $allPatientList->email_address }}"
data-phonenumber="{{ $allPatientList->phone_or_mobile_number }}"
data-nidnumber="{{ $allPatientList->nid_number }}"
data-nationality="{{ $allPatientList->nationality }}"
>{{ $allPatientList->patient_id }}</option>
                                     @endforeach
                                    </select>
                                    </div>
                                </div> --}}
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Patient Information</h4>
                                        </div><!-- end card header -->

                                        <div class="card-body">
                                            <div class="live-preview">
                                                <div class="row g-3">
                                                    <div class="col-xxl-4">
                                                        <div class="card ribbon-box border shadow-none mb-lg-0">
                                                            <div class="card-body">
                                                                <div class="ribbon ribbon-primary round-shape">
                                                                    Primary
                                                                </div>
                                                                {{-- <h5 class="fs-14 text-end" id="ptype">Walk By Patient</h5> --}}

                                                                <div class="card-body" id="mainDetailOne">


                                                                    <div class="ribbon-content mt-4 text-muted">
                                                                        <p>Name: <span id="mmName"></span></p>
                                                                        <p>Age: <span id="mmAge"></span></p>
                                                                        <p>Email Address: <span id="mmEmail"></span></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>

                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="" class="form-label">Recommended Pack name  </label>
                                        <select class="js-example-basic-multiple form-control"  multiple="multiple" name="pack_id[]" required>
                                            <option>-- Please Select --</option>
                                            @foreach($facialPackLists as $allDoctorList)
                                            <option value="{{ $allDoctorList->id }}">{{ $allDoctorList->pack_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->


        <div class="text-end mb-3">
            <button type="submit" class="btn btn-primary w-sm" id="final_button" >Submit
            </button>
        </div>
        </form>

    </div>

    <!-- End Page-content -->


@endsection


@section('script')

<script type="text/javascript">




    $( "#searchnew" ).autocomplete({



        source: function( request, response ) {
          $.ajax({
            url: '{{ route("searchPatientForAppoinmentInfo") }}',
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
           $('#mmName').html(ui.item.value);
           $('#modalName').val(ui.item.value);
           $('#patient_id').val(ui.item.patient_reg_id);
           $('#mmAge').html(ui.item.age);
           $('#mmEmail').html(ui.item.email);
           console.log(ui.item);
           return false;
        }
      });

</script>


<script>
    // $('#appointment_time').change(function(){

        $(document).on('change keyup keydown keypress click blur', '#appointment_time', function() {

        var getTheValue = $(this).val();
        var mainDate = $('#datepicker').val();
        var mainDocId = $('#mainDocId').val();
        //alert(getTheValue);

        $.ajax({
url: "{{ route('checkAppoinmentInfo') }}",
method: 'GET',
data: {getTheValue:getTheValue,mainDate:mainDate,mainDocId:mainDocId},
success: function(data) {

    //alert(data);

    if(data >= 1){

        $("#final_button").hide();
       $('#dataCheck').html('Slot Not Available');
        $("#dataCheck").css({"color": "red"});



    }else{

        $("#final_button").show();
        $('#dataCheck').html('Slot Available');
        $("#dataCheck").css({"color": "green"});


    }

}
});

    });

</script>
<script>
    $(function(){
    $('#patient_id').change(function(){
       var selected = $(this).find('option:selected');
       var name = selected.data('name');
       var age = selected.data('age');
       var address = selected.data('address');
       var email_address = selected.data('emailaddress');
       var phone_or_mobile_number = selected.data('phonenumber');
       var nid_number = selected.data('nidnumber');
       var nationality = selected.data('nationality');

       var gender = selected.data('gender');
       var ptype = selected.data('ptype');


//alert(name);

$('#ptype').html(ptype);

$('#ptypestore').val(ptype);

       $("#gender").val(gender).change();
       $('#name').html(name);
       $('#age').html(age);
       $('#address').val(address);
       $('#email_address').html(email_address);
       $('#phone_or_mobile_number').val(phone_or_mobile_number);
       $('#nid_number').val(nid_number);
       $('#nationality').val(nationality);


    });
});

    </script>
@endsection

