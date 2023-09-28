@extends('admin.master.masterCreate')
@section('title')
Therapy Appointment  | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Therapy Appointment</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Therapy Appointment</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        {{-- <form action="{{ route('walkByPatientTherapy.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf --}}
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Basic Information</h4>
                        @include('flash_message')
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <div class="col-12 mb-2">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name ="name" value="{{Session::get('name')}}" class="form-control nameWiseData" id="searchnew" placeholder="Type Name/Phone/Patient ID" required>
                                        </div>
                                    </div>
                                </div>
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
                                                            <div class="card-body" id="mainDetailOne">


                                                                <div class="ribbon-content mt-4 text-muted">
                                                                    <p>Name: <span id="mmName">{{Session::get('name')}}</span></p>
                                                                    <p>Age: <span id="mmAge">{{Session::get('age')}}</span></p>
                                                                    <p>Email Address: <span id="mmEmail">{{Session::get('email')}}</span></p>
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

        <div class="row">
            <div class="col-lg-12">
                <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary" style="">
                Add Therapy
                </button>
            </div>
        </div>
<!--<select class="js-example-basic-multiple" name="states[]" multiple="multiple">-->
<!--  <option value="AL">Alabama</option>-->
<!--    ...-->
<!--  <option value="WY">Wyoming</option>-->
<!--</select>-->
        <?php


///new code alll

$facePackAppoinmentList = DB::table('face_pack_appoinments')
        ->where('patient_id',Session::get('patientId'))
        ->where('status',0)
        ->latest()->get();

        //dd($facePackAppoinmentList);
        $convert_name_title1 = $facePackAppoinmentList->implode("id", " ");
        $separated_data_title1 = explode(" ", $convert_name_title1);

        $facePackAppoinmentList = DB::table('face_pack_appoinment_details')
        ->whereIn('appoinment_id',$separated_data_title1)->latest()->get();



//end new code all

        $therapyAppoinmentList = DB::table('therapy_appointments')
        ->where('patient_id',Session::get('patientId'))
        ->where('status',0)
        ->latest()->get();

        $convert_name_title = $therapyAppoinmentList->implode("id", " ");
        $separated_data_title = explode(" ", $convert_name_title);

        $therapyAppoinmentList = DB::table('therapy_appointment_details')
        ->whereIn('therapy_appointment_id',$separated_data_title)->latest()->get();
        $therapistList = DB::table('therapists')->latest()->get();
        ?>

        @if(count($therapyAppoinmentList) > 0 || count($facePackAppoinmentList) > 0 )

        <form method="post" enctype="multipart/form-data" id="form" data-parsley-validate="" action="{{ route('patientFinalSubmit')  }}">
@csrf


            <div class="card mt-5">
                <div class="card-body">
                    <div class="row mt-3">

            <h4 class="card-title mb-0 flex-grow-1">Therapy/FacePack Appointment Date & Time</h4>
            @foreach($facePackAppoinmentList as $j=>$allfacePackAppoinmentList)
            
            

            <?php
            $facePack = DB::table('face_packs')->where('id',$allfacePackAppoinmentList->face_pack_id)
            ->value('pack_name');
                        ?>
<input type="hidden" required  name="face_type[]" value="1"
class="form-control mt-2" id="checkData"/>
<div class="col-lg-2">
    
    <!--label-->
    
  <label class="mt-2">Name  <span class="text-danger"><b>(Face Pack)</b></span></label>

    <!--label-->
    <input type="text" required  name="therapy_id[{{$j+4000}}][]" value="{{ $facePack }}"
               class="form-control mt-2" id="checkData"/>
    </div>

<div class="col-lg-2">
      <!--label-->
    
  <label class="mt-2">Appointment Date</label>
    <!--label-->
<input type="date" required  name="date[{{$j+4000}}][]" value=""
           class="form-control mt-2 " id="checkData"/>
</div>
<div class="col-lg-2">
    
       <!--label-->
    
  <label class="mt-2">Start Time</label>
    <!--label-->
    
    <input type="time" required name="start_time[{{$j+4000}}][]" id="checkStartTime"
           class="form-control mt-2"/>
</div>
<div class="col-lg-2">
    
       <!--label-->
    
  <label class="mt-2">End Time</label>
    <!--label-->
    
    <input type="time" required name="end_time[{{$j+4000}}][]" id="checkEndTime"
           class="form-control mt-2"/>
</div>
<div class="col-lg-2">
    
         <!--label-->
    
  <label class="mt-2">Therapist List</label>
    <!--label-->
    
 

           <select class="js-example-basic-multiple mt-2"  required  name="therapist_id{{$j+4000}}[{{$j+4000}}][]" multiple="multiple">
            <option value="">--Please Select --</option>
                @foreach($therapistList as $allTherapistList)
                <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                @endforeach

            </select>
</div>
<div class="col-lg-2">
        
                              
                               <a   type="button" class="btn btn-danger waves-light waves-effect mt-5  btn-sm" href="{{ route('face_pack_delete',$allfacePackAppoinmentList->id) }}" data-toggle="tooltip" title="Delete">
                     <i class="ri-delete-bin-5-fill"></i></a>
</div>

            @endforeach

            @foreach($therapyAppoinmentList as $k=>$allTherapyPackage)

            <?php
$therapYListPackage = DB::table('therapy_lists')->where('id',$allTherapyPackage->therapy_name)->value('name');
            ?>
<input type="hidden" required  name="face_type_t[]" value="0"
class="form-control mt-2" id="checkData"/>
            <div class="col-lg-2">
                <!--label-->
    
    <label class="mt-2">
        
        Name
        @if($allTherapyPackage->name =="Single")
        <span class="text-danger"><b>(Single)</b></span>
        @else
        <span class="text-danger"><b>(Package)</b></span>
        
        @endif
        
        
        </label>
    <!--label-->
                <input type="text" required  name="therapy_id_t[{{$k}}][]" value="{{ $therapYListPackage }}"
                           class="form-control mt-2" id="checkData"/>
                </div>

            <div class="col-lg-2">
                  <!--label-->
    
  <label class="mt-2">Appointment Date</label>
    <!--label-->
            <input type="date" required  name="date_t[{{$k}}][]" value=""
                       class="form-control mt-2" id="checkData"/>
            </div>
            <div class="col-lg-2">
                  <!--label-->
    
  <label class="mt-2">Start Time</label>
    <!--label-->
                <input type="time" required name="start_time_t[{{$k}}][]" id="checkStartTime"
                       class="form-control mt-2"/>
            </div>
            <div class="col-lg-2">
                       <!--label-->
    
  <label class="mt-2">End Time</label>
    <!--label-->
                <input type="time" required name="end_time_t[{{$k}}][]" id="checkEndTime"
                       class="form-control mt-2"/>
            </div>
            <div class="col-lg-2">
       <!--label-->
    
  <label class="mt-2">Therapist List</label>
    <!--label-->
                       <select class="form-select mt-2 js-example-basic-multiple"  required aria-label="Default select example" name="therapist_id_t{{$k}}[{{$k}}][]" multiple="multiple">
                        <option value="">--Please Select --</option>
                            @foreach($therapistList as $allTherapistList)
                            <option value="{{ $allTherapistList->id }}">{{ $allTherapistList->name }}</option>
                            @endforeach

                        </select>
            </div>
            <div class="col-lg-2">
                 <a   type="button" class="btn btn-danger waves-light waves-effect mt-5  btn-sm" href="{{ route('therapy_delete',$allTherapyPackage->id) }}" data-toggle="tooltip" title="Delete">
                     <i class="ri-delete-bin-5-fill"></i></a>
 
            </div>

            @endforeach
        </div>

        <button  class="btn btn-primary mt-3 " type="submit">
            Submit TherapistInfo
            </button>
        </form>



        @else


        @endif
    </div>
</div>
</div>

<!-- Default Modals -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Therapy Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('walkByPatientTherapy.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name ="name" value="{{ Session::get('patientName') }}" class="form-control" id="modalName" placeholder="Name" required readonly>
                            <input type="hidden" name ="patient_id" value="{{ Session::get('patientId') }}" class="form-control" id="patient_id" placeholder="Name" required>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="" class="form-label">Therapy Type</label>
                            <select name ="therapy_type" class="form-control" id="therapy_type" required>
                                <option value="">--Please Select--</option>
                                <option value="Single">Single</option>
                                <option value="Package">Package</option>
                                <option value="Face Pack">Face Pack</option>
                            </select>
                        </div>



                    </div>

                    <div class="row mt-3" id="showDataaa">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



{{-- </form> --}}

</div>
@endsection

@section('script')


<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You will not be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>


<script>

    ////
    $('#therapy_type').change(function(){

        var getMainVal = $(this).val();



        $.ajax({
            url: "{{ route('getTherapyType') }}",
            method: 'GET',
            data: {getMainVal:getMainVal},
            success: function(data) {

                //alert(data);

              $("#showDataaa").html('');
              $("#showDataaa").html(data);
            }
        });


    });
    //////


    </script>

    <script type="text/javascript">




        $( "#searchnew" ).autocomplete({



            source: function( request, response ) {
              $.ajax({
                url: '{{ route("searchPatientForTherapy") }}',
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
@endsection
