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
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('walkByPatientTherapy.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New Therapy Appoinment</button>

                                    </div>
                                </div>

                            </div>
                            <!--new code -->

 <!-- Nav tabs -->
 <ul class="nav nav-pills nav-justified mb-3" role="tablist">
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
            Today
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
            All
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
                                        <th class="sort" data-sort="customer_name">Type</th>
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
                                        <td class="email">
@if($allTherapyAppointmentDateAndTimeList->face_pack_status == 0)

Therapy

@else

Face Pack

@endif

                                        </td>
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



                                                    @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))

                                                    @if($allTherapyAppointmentDateAndTimeList->face_pack_status == 0)



@else

<button type="button" class="btn btn-success btn-sm add-btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $allTherapyAppointmentDateAndTimeList->id }}">
    <i class="ri-eye-fill"></i></button>


    <div id="myModal{{ $allTherapyAppointmentDateAndTimeList->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">

                <?php

                $allTherapyLists = DB::table('face_packs')->where('pack_name',$allTherapyAppointmentDateAndTimeList->therapy)
                ->first();
$faceIngredientList = DB::table('facial_packs')
->where('face_pack_id',$allTherapyLists->id )->get();

                    ?>
                  <h5 class="modal-title" id="myModalLabel">{{ $allTherapyLists->pack_name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
              </div>
              <div class="modal-body">

                  @foreach($faceIngredientList as $allFaceIngredientList)







                  <div class="card">
                      <div class="card-header bg-success">
                          {{ $allFaceIngredientList->pack_name  }}
</div>
<div class="card-body">
<?php
$facialPackDetail = DB::table('facial_pack_details')
->where('face_pack_id',$allFaceIngredientList->id )->get();

?>

@foreach($facialPackDetail as $AllfacialPackDetail)
<?php
$ingredientName = DB::table('other_ingredients')
->where('id',$AllfacialPackDetail->ingredient_id )->value('name');

?>
{{ $ingredientName }} - {{ $AllfacialPackDetail->amount }}<br>
@endforeach
</div>
                  </div>


      @endforeach

              </div>


          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@endif



                                                    {{-- <li><a href="{{ route('walkByPatientTherapy.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li> --}}
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('therapyAppointmentUpdate'))
                                                    {{-- <li><a class="dropdown-item edit-item-btn" href="{{ route('therapyAppointments.edit',$allTherapyAppointmentDateAndTimeList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> --}}
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('therapyAppointmentDelete'))
                                                    <button class="btn btn-danger btn-sm add-btn" onclick="deleteTag({{ $allTherapyAppointmentDateAndTimeList->id}})" >
                                                        <i class="ri-delete-bin-fill"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $allTherapyAppointmentDateAndTimeList->id }}" action="{{ route('walkByPatientTherapy.destroy',$allTherapyAppointmentDateAndTimeList->id) }}" method="POST" style="display: none;">
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
       
        
        <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">
            
             <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Sl No</th>
                                        <th class="sort" data-sort="customer_name">Type</th>
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
                                    @foreach($therapyAppointmentDateAndTimeListAll as $key=>$allTherapyAppointmentDateAndTimeList)

                                 <?php
                                    $getNameFromWalkByPatient = DB::table('walk_by_patients')
                                    ->where('patient_reg_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');
                                    $getNameFromPatient = DB::table('patients')
                                    ->where('patient_id',$allTherapyAppointmentDateAndTimeList->patient_id)->value('name');


                                  ?>

                                    <tr>

                                        <td class="email">{{ $key+1 }}</td>
                                        <td class="email">
@if($allTherapyAppointmentDateAndTimeList->face_pack_status == 0)

Therapy

@else

Face Pack

@endif

                                        </td>
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



                                                    @if (Auth::guard('admin')->user()->can('therapyAppointmentView'))

                                                    @if($allTherapyAppointmentDateAndTimeList->face_pack_status == 0)



@else

<button type="button" class="btn btn-success btn-sm add-btn" data-bs-toggle="modal" data-bs-target="#myModal{{ $allTherapyAppointmentDateAndTimeList->id }}">
    <i class="ri-eye-fill"></i></button>


    <div id="myModal{{ $allTherapyAppointmentDateAndTimeList->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">

                <?php
//dd(1);
                $allTherapyLists = DB::table('face_packs')->where('pack_name',$allTherapyAppointmentDateAndTimeList->therapy)
                ->first();
                //dd(  $allTherapyLists->id );
              
$faceIngredientList = DB::table('facial_packs')
->where('face_pack_id',$allTherapyLists->id )->get();


  

                    ?>
                  <h5 class="modal-title" id="myModalLabel">{{ $allTherapyLists->pack_name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
              </div>
              <div class="modal-body">

                  @foreach($faceIngredientList as $allFaceIngredientList)







                  <div class="card">
                      <div class="card-header bg-success">
                          {{ $allFaceIngredientList->pack_name  }}
</div>
<div class="card-body">
<?php
$facialPackDetail = DB::table('facial_pack_details')
->where('face_pack_id',$allFaceIngredientList->id )->get();

?>

@foreach($facialPackDetail as $AllfacialPackDetail)
<?php
$ingredientName = DB::table('other_ingredients')
->where('id',$AllfacialPackDetail->ingredient_id )->value('name');

?>
{{ $ingredientName }} - {{ $AllfacialPackDetail->amount }}<br>
@endforeach
</div>
                  </div>


      @endforeach

              </div>


          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@endif



                                                    {{-- <li><a href="{{ route('walkByPatientTherapy.show',$allTherapyAppointmentDateAndTimeList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li> --}}
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('therapyAppointmentUpdate'))
                                                    {{-- <li><a class="dropdown-item edit-item-btn" href="{{ route('therapyAppointments.edit',$allTherapyAppointmentDateAndTimeList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> --}}
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('therapyAppointmentDelete'))
                                                    <button class="btn btn-danger btn-sm add-btn" onclick="deleteTag({{ $allTherapyAppointmentDateAndTimeList->id}})" >
                                                        <i class="ri-delete-bin-fill"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $allTherapyAppointmentDateAndTimeList->id }}" action="{{ route('walkByPatientTherapy.destroy',$allTherapyAppointmentDateAndTimeList->id) }}" method="POST" style="display: none;">
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
<!-- new code end -->

                             




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
