@extends('admin.master.master')
@section('title')
Therapy Appointment | {{ $ins_name }}
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


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Therapy Appointment Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">


                        <div id="customerList">
                            <div class="row g-4 mb-3">
                              

                            </div>

                            <!--new code -->

 <!-- Nav tabs -->
 <ul class="nav nav-pills nav-justified mb-3" role="tablist">
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
            ALL
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
            Tomorrow
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-messages-1" role="tab">
            Previous
        </a>
    </li>

</ul>
<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">



        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
            <thead class="table-light">
            <tr>
                <th class="sort" data-sort="customer_name">Sl No</th>
                <th class="sort" data-sort="customer_name">Serial Number</th>
                <th class="sort" data-sort="customer_name">Patient Id</th>
                <th class="sort" data-sort="customer_name">Patient Name</th>
                <th class="sort" data-sort="email">Doctor Name</th>
                <th class="sort" data-sort="phone">Appointment Data</th>
                  <th class="sort" data-sort="phone">Status</th>
                <th class="sort" data-sort="action">Action</th>
            </tr>
            </thead>
            <tbody class="list form-check-all">
            @foreach($therapyAppointmentDateAndTimeList as $key=>$allTherapyAppointmentDateAndTimeList)

         <?php
            $getNameFromWalkByPatient = DB::table('walk_by_patients')
            ->where('patient_reg_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');
            $getNameFromPatient = DB::table('patients')
            ->where('patient_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');


          ?>

            <tr>

                <td class="email">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allTherapyAppointmentDateAndTimeList->serial }}</td>
                <td class="email">{{ $allTherapyAppointmentDateAndTimeList->patient_id }}</td>
                <td class="email">

                    @if(empty($getNameFromWalkByPatient))

{{ $getNameFromPatient }}
                    @else
{{ $getNameFromWalkByPatient }}
                    @endif
                </td>
                <td class="email">

                    <?php
$getNameTherapist = DB::table('therapists')
            ->where('id',$allTherapyAppointmentDateAndTimeList->therapist)->value('name');

                    ?>

                    {{ $getNameTherapist }}

                </td>
                <td class="phone">{{ $allTherapyAppointmentDateAndTimeList->date }}</td>

<td class="phone">Not Received</td>
                <td>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))
                            <li><a href="{{ route('therapyAppointments.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                            @endif
                          
                        </ul>
                    </div>
                </td>
            </tr>
@endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">



        <table id="example" class="display table table-bordered" style="width:100%">
            <thead class="table-light">
            <tr>
                <th class="sort" data-sort="customer_name">Sl No</th>
                <th class="sort" data-sort="customer_name">Serial Number</th>
                <th class="sort" data-sort="customer_name">Patient Id</th>
                <th class="sort" data-sort="customer_name">Patient Name</th>
                <th class="sort" data-sort="email">Doctor Name</th>
                <th class="sort" data-sort="phone">Appointment Data</th>
                  <th class="sort" data-sort="phone">Status</th>
                <th class="sort" data-sort="action">Action</th>
            </tr>
            </thead>
            <tbody class="list form-check-all">
            @foreach($therapyAppointmentDateAndTimeListTomorrow as $key=>$allTherapyAppointmentDateAndTimeList)

         <?php
            $getNameFromWalkByPatient = DB::table('walk_by_patients')
            ->where('patient_reg_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');
            $getNameFromPatient = DB::table('patients')
            ->where('patient_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');


          ?>

            <tr>

                <td class="email">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allTherapyAppointmentDateAndTimeList->serial }}</td>
                <td class="email">{{ $allTherapyAppointmentDateAndTimeList->patient_id }}</td>
                <td class="email">

                    @if(empty($getNameFromWalkByPatient))

{{ $getNameFromPatient }}
                    @else
{{ $getNameFromWalkByPatient }}
                    @endif
                </td>
                <td class="email">

                    <?php
$getNameTherapist = DB::table('therapists')
            ->where('id',$allTherapyAppointmentDateAndTimeList->therapist)->value('name');

                    ?>

                    {{ $getNameTherapist }}

                </td>
                <td class="phone">{{ $allTherapyAppointmentDateAndTimeList->date }}</td>

<td class="phone">Not Received</td>
                <td>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))
                            <li><a href="{{ route('therapyAppointments.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                            @endif
                          
                        </ul>
                    </div>
                </td>
            </tr>
@endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane" id="pill-justified-messages-1" role="tabpanel">
        <table id="fixed-header" class="display table table-bordered" style="width:100%">
            <thead class="table-light">
            <tr>
                <th class="sort" data-sort="customer_name">Sl No</th>
                <th class="sort" data-sort="customer_name">Serial Number</th>
                <th class="sort" data-sort="customer_name">Patient Id</th>
                <th class="sort" data-sort="customer_name">Patient Name</th>
                <th class="sort" data-sort="email">Doctor Name</th>
                <th class="sort" data-sort="phone">Appointment Data</th>
                  <th class="sort" data-sort="phone">Status</th>
                <th class="sort" data-sort="action">Action</th>
            </tr>
            </thead>
            <tbody class="list form-check-all">
            @foreach($therapyAppointmentDateAndTimeListYesterday as $key=>$allTherapyAppointmentDateAndTimeList)

         <?php
            $getNameFromWalkByPatient = DB::table('walk_by_patients')
            ->where('patient_reg_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');
            $getNameFromPatient = DB::table('patients')
            ->where('patient_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');


          ?>

            <tr>

                <td class="email">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allTherapyAppointmentDateAndTimeList->serial }}</td>
                <td class="email">{{ $allTherapyAppointmentDateAndTimeList->patient_id }}</td>
                <td class="email">

                    @if(empty($getNameFromWalkByPatient))

{{ $getNameFromPatient }}
                    @else
{{ $getNameFromWalkByPatient }}
                    @endif
                </td>
                <td class="email">

                    <?php
$getNameTherapist = DB::table('therapists')
            ->where('id',$allTherapyAppointmentDateAndTimeList->therapist)->value('name');

                    ?>

                    {{ $getNameTherapist }}

                </td>
                <td class="phone">{{ $allTherapyAppointmentDateAndTimeList->date }}</td>

<td class="phone">Not Received</td>
                <td>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-fill align-middle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))
                            <li><a href="{{ route('therapyAppointments.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
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

<!-- new code -->








                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection

@section('script')

@endsection
