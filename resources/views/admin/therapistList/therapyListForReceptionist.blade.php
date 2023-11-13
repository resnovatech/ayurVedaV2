@extends('admin.master.master')

@section('title')
Therapy List For Receptionist | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Therapy List For Receptionist</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Therapy List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Therapy Info</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
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
                                @foreach($therapyAppointmentDateAndTimeListTomorrowM as $key=>$allTherapyAppointmentDateAndTimeList)

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

                       <td class="phone">
                        @if(empty($allTherapyAppointmentDateAndTimeList->status))

                        Pending
                                            @else

                        {{ $allTherapyAppointmentDateAndTimeList->status }}
                                            @endif
                       </td>
                                       <td>

                                                   @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))
                                                   {{-- <li><a href="{{ route('therapyAppointments.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li> --}}






                                                   @endif
                                                   @if (Auth::guard('admin')->user()->can('therapyAppointmentUpdate'))
                                                   {{-- <li><a class="dropdown-item edit-item-btn" href="{{ route('therapyAppointments.edit',$allTherapyAppointmentDateAndTimeList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> --}}
                                                   @endif
                                                   @if (Auth::guard('admin')->user()->can('therapyAppointmentDelete'))
                                                   <button class="btn btn-danger btn-sm add-btn" onclick="deleteTag({{ $allTherapyAppointmentDateAndTimeList->id}})" >
                                                       <i class="ri-delete-bin-fill"></i>
                                                   </button>
                                                   <form id="delete-form-{{ $allTherapyAppointmentDateAndTimeList->id }}" action="{{ route('therapyAppointments.destroy',$allTherapyAppointmentDateAndTimeList->id) }}" method="POST" style="display: none;">
                                                       @method('DELETE')
                                                                                     @csrf

                                                                                 </form>
                                                   @endif

                                       </td>
                                   </tr>
                       @endforeach
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

                <td class="phone">

                    @if(empty($allTherapyAppointmentDateAndTimeList->status))

Pending
                    @else

{{ $allTherapyAppointmentDateAndTimeList->status }}
                    @endif

                </td>
                                <td>

                                            @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))
                                            {{-- <li><a href="{{ route('therapyAppointments.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li> --}}






                                            @endif
                                            @if (Auth::guard('admin')->user()->can('therapyAppointmentUpdate'))
                                            {{-- <li><a class="dropdown-item edit-item-btn" href="{{ route('therapyAppointments.edit',$allTherapyAppointmentDateAndTimeList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> --}}
                                            @endif
                                            @if (Auth::guard('admin')->user()->can('therapyAppointmentDelete'))
                                            <button class="btn btn-danger btn-sm add-btn" onclick="deleteTag({{ $allTherapyAppointmentDateAndTimeList->id}})" >
                                                <i class="ri-delete-bin-fill"></i>
                                            </button>
                                            <form id="delete-form-{{ $allTherapyAppointmentDateAndTimeList->id }}" action="{{ route('therapyAppointments.destroy',$allTherapyAppointmentDateAndTimeList->id) }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                                              @csrf

                                                                          </form>
                                            @endif

                                </td>
                            </tr>
                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>






    </div>
</div>
@endsection


@section('script')

@endsection
