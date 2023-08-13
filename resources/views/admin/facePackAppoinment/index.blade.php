@extends('admin.master.master')
@section('title')
Face Pack Appointment List | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Face Pack Appointment List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Face Pack Appointment</li>
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
                        <h4 class="card-title mb-0">Face Pack Appointment Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('facePackAppoinment.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New Patient Admit Info</button>

                                    </div>
                                </div>

                            </div>


                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Serial Number</th>
                                        <th class="sort" data-sort="customer_name">Patient Id</th>
                                        <th class="sort" data-sort="email">Pack Name List</th>

                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @foreach($doctorAppointmentList as $key=>$allDoctorAppointmentList)
                                    <tr>


                                        <td class="customer_name">{{ $key+1 }}</td>
                                        <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>

                                        <td class="email">
                                            <?php


                                            $faceIngredientList = DB::table('face_pack_appoinment_details')
                                            ->where('appoinment_id',$allDoctorAppointmentList->id )->get();

                                                                                        ?>

                                                                                      @foreach($faceIngredientList as $allFaceIngredientList)





                                                                                                  <?php

                                                                                                $getFinalName = DB::table('face_packs')
                                                                                                ->where('id',$allFaceIngredientList->face_pack_id )->value('pack_name');

                                                                                                  ?>

                                            {{ $getFinalName  }}<br>



                                                                                      @endforeach

                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">


                                                    @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('facePackAppoinment.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                                                      @csrf

                                                                                  </form>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
@endforeach
                                    </tbody>
                                </table>




                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection


@section('script')

@endsection
