@extends('admin.master.master')

@section('title')
Dashboard
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Hello, {{ Auth::guard('admin')->user()->name }}!</h4>
                                    <p class="text-muted mb-0">Here's what's happening with your site today.</p>
                                </div>

                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="d-flex flex-column h-100">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-success)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-semibold text-muted text-truncate mb-3"> Total Attend</p>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="{{ $totalPatientAdmit }}">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-success)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-semibold text-muted text-truncate mb-3"> Walk-By-Patient</p>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="{{ $totalWalkByPatient }}">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="apply_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-6 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-success)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-semibold text-muted text-truncate mb-3">Patient</p>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="{{ $totalPatient }}">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="new_jobs_chart" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-6 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-success)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-semibold text-muted text-truncate mb-3"> Total Doctor</p>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="{{ $totalDoctor }}">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="interview_chart" data-colors='["--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-success)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-semibold text-muted text-truncate mb-3"> Total Therapist</p>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="{{ $totalTherapist }}">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="hired_chart" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!--end col-->
                                    <div class="col-xl-6 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate overflow-hidden">
                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                    <style>
                                                        .s0 {
                                                            opacity: .05;
                                                            fill: var(--vz-success)
                                                        }
                                                    </style>
                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                                </svg>
                                            </div>
                                            <div class="card-body" style="z-index:1 ;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-semibold text-muted text-truncate mb-3"> Total Staff</p>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target="{{ $totalStaff }}">0</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div id="rejected_chart" data-colors='["--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div><!--end row-->
                            </div>
                        </div><!--end col-->
                        <div class="col-xl-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Waiting Client</h4>

                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <div id="customerList">



                                            <table  class="display table table-bordered" style="width:100%">
                                                <thead class="table-light">
                                                <tr>


                                                    <th class="sort" data-sort="customer_name">Patient Id</th>
                                                    <th class="sort" data-sort="email">Name</th>
                                                    <th class="sort" data-sort="email">Phone</th>
                                                    <th class="sort" data-sort="email">Consult Doctor</th>
                                                    <th class="sort" data-sort="phone">Status</th>
                                                    <th class="sort" data-sort="action">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                @foreach($doctorWaitingList as $key=>$allDoctorAppointmentList)
                                                <?php
                                                  $getNameFromWalkByPatient = DB::table('walk_by_patients')
                                                  ->where('patient_reg_id',$allDoctorAppointmentList->patient_id)->value('name');
                                                  $getNameFromPatient = DB::table('patients')
                                                  ->where('patient_id',$allDoctorAppointmentList->patient_id)->value('name');


                                                  $getPhoneFromWalkByPatient = DB::table('walk_by_patients')
                                                  ->where('patient_reg_id',$allDoctorAppointmentList->patient_id)->value('phone_or_mobile_number');
                                                  $getPhoneFromPatient = DB::table('patients')
                                                  ->where('patient_id',$allDoctorAppointmentList->patient_id)->value('phone_or_mobile_number');
                                                ?>
                                                <tr>


                                                    <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                                    <td class="email">

                                                        @if(empty($getNameFromWalkByPatient))

            {{ $getNameFromPatient }}
                                                        @else
            {{ $getNameFromWalkByPatient }}
                                                        @endif
                                                    </td>
                                                    <td class="email">
                                                        @if(empty($getPhoneFromWalkByPatient))

                                                        {{ $getPhoneFromPatient }}
                                                                                                    @else
                                                        {{ $getPhoneFromWalkByPatient }}
                                                                                                    @endif
                                                    </td>
                                                    <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                                    <td class="phone">


                                                        @if($allDoctorAppointmentList->status == 1)

            Complete
                                                        @else
            Ongoing
                                                        @endif
                                                    </td>


                                                    <td>
                                                        <div class="dropdown d-inline-block">


                                                                @if (Auth::guard('admin')->user()->can('patientPrescriptionListAdd'))
                                                             <a href="{{ route('addPatientHistory',$allDoctorAppointmentList->id) }}" class="btn btn-primary btn-sm" >Add Prescription</a>
                                                                @endif

                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
            @endforeach
                                                </tbody>
                                            </table>




                                    </div>
                                    </div>

                                </div>
                            </div> <!-- .card-->
                        </div><!--end col-->
                    </div><!--end row-->



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm-auto">
                                            <div>
                                                <h4 class="card-title mb-0 flex-grow-1">Therapist Information</h4>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="recomended-jobs" class="table-card">

                                        <table  class="display table table-bordered" style="width:100%">
                                            <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">Sl</th>
                                                <th class="sort" data-sort="customer_name">Therapist Name</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <th class="sort" data-sort="email">Phone Number</th>
                                                <th class="sort" data-sort="email">Address</th>
                                                <th class="sort" data-sort="email">NID</th>
                                                <th class="sort" data-sort="email">Nationality</th>
                                                <th class="sort" data-sort="email">DOB</th>
                                                <th class="sort" data-sort="email">Years Of experience</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach($therapistList as $key=>$allTherapistList)
                                            <tr>

                                                <td class="id">{{ $key+1 }}</td>
                                                <td class="customer_name">{{ $allTherapistList->name }}</td>
                                                <td class="email">{{ $allTherapistList->email }}</td>
                                                <td class="email">{{ $allTherapistList->phone_or_mobile_number }}</td>
                                                <td class="email">{{ $allTherapistList->address }}</td>
                                                <td class="email">{{ $allTherapistList->nid_number }}</td>
                                                <td class="email">{{ $allTherapistList->nationality }}</td>
                                                <td class="email">{{ $allTherapistList->dob }}</td>
                                                <td class="email">{{ $allTherapistList->years_of_experience }}</td>
                                                <td>




                                                    @if (Auth::guard('admin')->user()->can('therapistView'))
                                                    <a href="{{ route('therapist.show',$allTherapistList->id) }}"
                                                    class="btn btn-success waves-light waves-effect  btn-sm" >
                                                    <i class="ri-eye-fill "></i></a>
        @endif






                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>




                                </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-xxl-8">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Doctor Information</h4>
                                    <div class="flex-shrink-0">

                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table  class="display table table-bordered" style="width:100%">
                                            <thead >
                                            <tr>
                                                <th >Sl</th>
                                                <th>Doctor</th>
                                                <th>Email</th>
                                                <th >Phone</th>
                                                <th >Consult Time</th>
                                                <th >Action</th>
                                            </tr>
                                            </thead>
                                            <tbody >

                                                @foreach($doctorList as $key=>$allDoctorList)
                                            <tr>

                                                <td >{{ $key+1 }}</td>
                                                <td >{{ $allDoctorList->name }}</td>
                                                <td >{{ $allDoctorList->email_address }}</td>
                                                <td >{{ $allDoctorList->phone_or_mobile_number }}</td>
                                                <?php $allDoctorList->doctorConsultDates ?>
                                                <td ><span class="badge badge-soft-success text-uppercase">




                                                    @foreach($allDoctorList->doctorConsultDates as $allConsultTime)
                                               Day: {{ $allConsultTime->day }} , StartTime:{{ $allConsultTime->start_time }} ,EndTime:{{ $allConsultTime->end_time }} <br><br>

                                                    @endforeach


                                                </span></td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="{{ route('doctors.show',$allDoctorList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- .card-->
                        </div> <!-- .col-->

                        <!-- end col -->
                    </div> <!-- end row-->



                </div> <!-- end .h-100-->

            </div> <!-- end col -->


        </div>

    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('script')

@endsection
