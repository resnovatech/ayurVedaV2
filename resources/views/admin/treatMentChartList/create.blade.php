@extends('admin.master.master')
@section('title')
TreatMent Chart | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">TreatMent Chart</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">TreatMent Chart</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form action="{{ route('treatMentChart.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
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
                                <div class="col-xxl-6 col-md-6">
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
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Therapy Information</h4>
                                        </div><!-- end card header -->

                                        <div class="card-body" id="main_content_table">


                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
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
            <button type="submit" class="btn btn-primary w-sm" >Submit
            </button>
        </div>
        </form>

    </div>

    <!-- End Page-content -->


@endsection


@section('script')
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


       //ajax code ///


       var registerId = $(this).val();


       $.ajax({
        url: "{{ route('getTherapyInformation') }}",
        method: 'GET',
        data: {registerId:registerId},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });


    });
});

    </script>
@endsection

