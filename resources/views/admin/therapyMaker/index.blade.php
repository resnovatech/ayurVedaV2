@extends('admin.master.master')

@section('title')
Therapy Maker List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Therapy Make</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header border-0">
                        <div class="row align-items-center gy-3">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">Therapy History</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#arrow-overview"
                                           role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                                            <span class="d-none d-sm-block">Request</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#arrow-profile"
                                           role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i
                                                        class="mdi mdi-account"></i></span>
                                            <span class="d-none d-sm-block">Ongoing</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#arrow-finished"
                                           role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                            <span class="d-none d-sm-block">Ready</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#arrow-contact"
                                           role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                                            <span class="d-none d-sm-block">All</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active show" id="arrow-overview" role="tabpanel">
                                        <div class="row mt-4">

                                            @foreach($therapyAppointmentDetailsRequest as $allTherapyAppointmentDetails)

                                            <?php

                                            $therapyId = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('id');


///////////////////


                                                    $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();



                                                    $therapyDetailList1 = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();

                                                   // dd(count($therapyDetailList));


                                                    if(count($therapyDetailList1) == 0){



$patientId = DB::table('patient_therapies')->where('patient_id',$therapistIdMain->patient_id)
->latest()->value('id');


$therapyDetailList = DB::table('patient_therapy_details')
                                                    ->where('patient_therapy_id', $patientId)->get();


//dd($patientId);

                                                    }else{

                                                        $therapyDetailList = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();


                                                    }

/////////////////////////////////////////////

                                                    $therapyName = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('name');


                                                    $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();
//dd($allTherapyAppointmentDetails->therapy_appointment_id);

if(!$therapistIdMain){
    $therapistName = '';
    $nnnn = '';
}else{

                                                    $therapistName = DB::table('therapists')
                                                    ->where('id',$therapistIdMain->therapist)->value('name');


                                                    $patientName = DB::table('walk_by_patients')
                                                    ->where('patient_reg_id',$therapistIdMain->patient_id)->value('name');

                                                    if(empty($patientName)){

                                               $nnnn =  DB::table('patients')
                                                    ->where('patient__id',$therapistIdMain->patient_id)->value('name');

                                                    }else{

                                                        $nnnn =  $patientName ;

                                                    }

                                                }




                                                ?>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Therapist name: {{ $therapistName }}

                                                        <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                                            @csrf
                                                                                                                <select class="form-control" name="status">
                                                                                                                    <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Request</option>
                                                                                                                    <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ongoing</option>
                                                                                                                    <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ready</option>




                                                                                                                </select>
                                                                                                                <input type="hidden" value="{{ $allTherapyAppointmentDetails->id }}" name="id" />

                                                                                                                <input type="hidden" value="2" name="mstatus" />


                                                                                                                <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                                        </form>

                                                    </div>
                                                    <div class="card-body p-4">
                                                        <h5>Patient Name: {{ $nnnn }}</h5>
                                                        <div class="card-body">
                                                            <h3>Therapy Name: {{ $therapyName }}</h3>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Ingredient</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                                @foreach($therapyDetailList as $allTherapyDetailList)

                                                                <?php

                                                                $therapyDetailListName = DB::table('therapy_ingredients')
                                                                        ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

                                                                    ?>
                                                                <tr>
                                                                    <td>{{$therapyDetailListName}}</td>
                                                                    <td>{{ $allTherapyDetailList->quantity }} {{ $allTherapyDetailList->unit }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
@endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="arrow-profile" role="tabpanel">
                                        <div class="row mt-4">

                                            @foreach($therapyAppointmentDetailsOngoing as $allTherapyAppointmentDetails)

                                            <?php

                                            $therapyId = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('id');

                                            //////////////////


                                            $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();



                                                    $therapyDetailList1 = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();

                                                   // dd(count($therapyDetailList));


                                                    if(count($therapyDetailList1) == 0){



$patientId = DB::table('patient_therapies')->where('patient_id',$therapistIdMain->patient_id)
->latest()->value('id');


$therapyDetailList = DB::table('patient_therapy_details')
                                                    ->where('patient_therapy_id', $patientId)->get();


//dd($patientId);

                                                    }else{

                                                        $therapyDetailList = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();


                                                    }

/////////////////////////////////////////////





                                                    $therapyName = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('name');


                                                    $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();
//dd($allTherapyAppointmentDetails->therapy_appointment_id);

if(!$therapistIdMain){
    $therapistName = '';
    $nnnn = '';
}else{

                                                    $therapistName = DB::table('therapists')
                                                    ->where('id',$therapistIdMain->therapist)->value('name');


                                                    $patientName = DB::table('walk_by_patients')
                                                    ->where('patient_reg_id',$therapistIdMain->patient_id)->value('name');

                                                    if(empty($patientName)){

                                               $nnnn =  DB::table('patients')
                                                    ->where('patient__id',$therapistIdMain->patient_id)->value('name');

                                                    }else{

                                                        $nnnn =  $patientName ;

                                                    }

                                                }




                                                ?>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Therapist name: {{ $therapistName }}
                                                        <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                                            @csrf
                                                                                                                <select class="form-control" name="status">
                                                                                                                    <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Request</option>
                                                                                                                    <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ongoing</option>
                                                                                                                    <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ready</option>




                                                                                                                </select>
                                                                                                                <input type="hidden" value="{{ $allTherapyAppointmentDetails->id }}" name="id" />

                                                                                                                <input type="hidden" value="2" name="mstatus" />


                                                                                                                <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                                        </form>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <h5>Patient Name: {{ $nnnn }}</h5>
                                                        <div class="card-body">
                                                            <h3>Therapy Name: {{ $therapyName }}</h3>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Ingredient</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                                @foreach($therapyDetailList as $allTherapyDetailList)

                                                                <?php

                                                                $therapyDetailListName = DB::table('therapy_ingredients')
                                                                        ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

                                                                    ?>
                                                                <tr>
                                                                    <td>{{$therapyDetailListName}}</td>
                                                                    <td>{{ $allTherapyDetailList->quantity }} {{ $allTherapyDetailList->unit }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
@endforeach
                                            <!--end col-->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="arrow-finished" role="tabpanel">
                                        <div class="row mt-4">

                                            @foreach($therapyAppointmentDetailsFinish as $allTherapyAppointmentDetails)

                                            <?php

                                            $therapyId = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('id');

                                          //////////////////


                                          $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();



                                                    $therapyDetailList1 = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();

                                                   // dd(count($therapyDetailList));


                                                    if(count($therapyDetailList1) == 0){



$patientId = DB::table('patient_therapies')->where('patient_id',$therapistIdMain->patient_id)
->latest()->value('id');


$therapyDetailList = DB::table('patient_therapy_details')
                                                    ->where('patient_therapy_id', $patientId)->get();


//dd($patientId);

                                                    }else{

                                                        $therapyDetailList = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();


                                                    }

/////////////////////////////////////////////




                                                    $therapyName = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('name');


                                                    $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();
//dd($allTherapyAppointmentDetails->therapy_appointment_id);

if(!$therapistIdMain){
    $therapistName = '';
    $nnnn = '';
}else{

                                                    $therapistName = DB::table('therapists')
                                                    ->where('id',$therapistIdMain->therapist)->value('name');


                                                    $patientName = DB::table('walk_by_patients')
                                                    ->where('patient_reg_id',$therapistIdMain->patient_id)->value('name');

                                                    if(empty($patientName)){

                                               $nnnn =  DB::table('patients')
                                                    ->where('patient__id',$therapistIdMain->patient_id)->value('name');

                                                    }else{

                                                        $nnnn =  $patientName ;

                                                    }

                                                }




                                                ?>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Therapist name: {{ $therapistName }}
                                                        <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                                            @csrf
                                                                                                                <select class="form-control" name="status">
                                                                                                                    <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Request</option>
                                                                                                                    <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ongoing</option>
                                                                                                                    <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ready</option>



                                                                                    <option value="All" {{ 'All' == $allTherapyAppointmentDetails->status ? 'selected':''}}>All</option>
                                                                                                                </select>
                                                                                                                <input type="hidden" value="{{ $allTherapyAppointmentDetails->id }}" name="id" />

                                                                                                                <input type="hidden" value="2" name="mstatus" />


                                                                                                                <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                                        </form>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <h5>Patient Name: {{ $nnnn }}</h5>
                                                        <div class="card-body">
                                                            <h3>Therapy Name: {{ $therapyName }}</h3>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Ingredient</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                                @foreach($therapyDetailList as $allTherapyDetailList)

                                                                <?php

                                                                $therapyDetailListName = DB::table('therapy_ingredients')
                                                                        ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

                                                                    ?>
                                                                <tr>
                                                                    <td>{{$therapyDetailListName}}</td>
                                                                    <td>{{ $allTherapyDetailList->quantity }} {{ $allTherapyDetailList->unit }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
@endforeach
                                            <!--end col-->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="arrow-contact" role="tabpanel">
                                        <div class="row mt-4">

                                            @foreach($therapyAppointmentDetails as $allTherapyAppointmentDetails)

                                            <?php

                                            $therapyId = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('id');

                                            $therapyDetailList = DB::table('single_ingredients')
                                                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();
                                                    $therapyName = DB::table('therapy_lists')
                                                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('name');


                                                    $therapistIdMain = DB::table('therapy_appointment_date_and_times')
                                                    ->where('therapy_appointment_id',$allTherapyAppointmentDetails->therapy_appointment_id)
                                                    ->first();
//dd($allTherapyAppointmentDetails->therapy_appointment_id);

if(!$therapistIdMain){
    $therapistName = '';
    $nnnn = '';
}else{

                                                    $therapistName = DB::table('therapists')
                                                    ->where('id',$therapistIdMain->therapist)->value('name');


                                                    $patientName = DB::table('walk_by_patients')
                                                    ->where('patient_reg_id',$therapistIdMain->patient_id)->value('name');

                                                    if(empty($patientName)){

                                               $nnnn =  DB::table('patients')
                                                    ->where('patient__id',$therapistIdMain->patient_id)->value('name');

                                                    }else{

                                                        $nnnn =  $patientName ;

                                                    }

                                                }




                                                ?>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Therapist name: {{ $therapistName }}
                                                        <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                                            @csrf
                                                                                                                <select class="form-control" name="status">
                                                                                                                    <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Request</option>
                                                                                                                    <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ongoing</option>
                                                                                                                    <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDetails->status ? 'selected':''}}>Ready</option>




                                                                                                                </select>
                                                                                                                <input type="hidden" value="{{ $allTherapyAppointmentDetails->id }}" name="id" />

                                                                                                                <input type="hidden" value="2" name="mstatus" />


                                                                                                                <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                                        </form>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <h5>Patient Name: {{ $nnnn }}</h5>
                                                        <div class="card-body">
                                                            <h3>Therapy Name: {{ $therapyName }}</h3>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Ingredient</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                                @foreach($therapyDetailList as $allTherapyDetailList)

                                                                <?php

                                                                $therapyDetailListName = DB::table('therapy_ingredients')
                                                                        ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

                                                                    ?>
                                                                <tr>
                                                                    <td>{{$therapyDetailListName}}</td>
                                                                    <td>{{ $allTherapyDetailList->quantity }} {{ $allTherapyDetailList->unit }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
@endforeach



                                            <!--end col-->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div>
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection
