@extends('admin.master.master')

@section('title')
Therapist Profile | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="page-content">
    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg">
                <img src="{{ asset('/') }}public/admin/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{ asset('/') }}public/user.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                    </div>
                </div>
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{ $therapistList->name}}</h3>
                        <p class="text-white-75">Therapist</p>
                        <div class="hstack text-white-50 gap-1">
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{ $therapistList->address}}</div>

                        </div>
                    </div>
                </div>
                <!--end col-->

                <!--end col-->

            </div>
            <!--end row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="d-flex profile-wrapper">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                    <i class="ri-list-unordered d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Pending Appoinment</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                    <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Cancelled Appoinment</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                    <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Completed Appoinment</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">


                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Full Name :</th>
                                                            <td class="text-muted">{{ $therapistList->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                            <td class="text-muted">{{ $therapistList->phone_or_mobile_number}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{ $therapistList->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">NID Number:</th>
                                                            <td class="text-muted">{{ $therapistList->nid_number}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Nationality</th>
                                                            <td class="text-muted">{{ $therapistList->nationality}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Year Of Experience</th>
                                                            <td class="text-muted">{{ $therapistList->years_of_experience}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->


                                </div>
                                <!--end col-->
                                <div class="col-xxl-9">


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0  me-2">Recent Appoinment</h4>
                                                    <div class="flex-shrink-0 ms-auto">
                                                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-bs-toggle="tab" href="#today" role="tab">
                                                                    Today
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab" href="#weekly" role="tab">
                                                                    Next
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="today" role="tabpanel">
                                                            <table  class="display table table-bordered" style="width:100%">
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

                                                    <td class="phone">
<form method="post" action="{{ route('therapyStatusUpdate') }}">
    @csrf
                                                        <select class="form-control" name="status">
                                                            <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                            <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                            <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                            <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                            <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                            <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                        </select>
                                                        <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->id }}" name="id" />
                                                        <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
</form>



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
                                                        <div class="tab-pane" id="weekly" role="tabpanel">
                                                            <table  class="display table table-bordered" style="width:100%">
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
                                                               <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                                                   @csrf
                                                                                                                       <select class="form-control" name="status">
                                                                                                                        <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                                                        <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                                                        <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                                                        <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                                                        <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                                                        <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                                                                                       </select>
                                                                                                                       <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->id }}" name="id" />
                                                                                                                       <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                                               </form>
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
                                                        <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                                            @csrf
                                                                                                                <select class="form-control" name="status">
                                                                                                                    <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                                                    <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                                                    <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                                                    <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                                                    <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                                                    <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                                                                                </select>
                                                                                                                <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->id }}" name="id" />
                                                                                                                <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                                        </form>
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
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->



                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="tab-pane fade" id="activities" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <table  class="display table table-bordered" style="width:100%">
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

                                        <!--main table start-->

                                        @foreach($therapyAppointmentPendingM as $key=>$allTherapyAppointmentDateAndTimeList)

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
                                   <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                       @csrf
                                                                                           <select class="form-control" name="status">

                                                                                            <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                            <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                            <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                            <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                            <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                            <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                                                           </select>
                                                                                           <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->id }}" name="id" />
                                                                                           <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                   </form>
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

                                        <!--end main table end -->
                                        @foreach($therapyAppointmentPending as $key=>$allTherapyAppointmentDateAndTimeList)

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
                                <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                    @csrf
                                                                                        <select class="form-control" name="status">
                                                                                            <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                            <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                            <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                            <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                            <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                            <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                                                        </select>
                                                                                        <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->id }}" name="id" />
                                                                                        <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                </form>
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
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="projects" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <table  class="display table table-bordered" style="width:100%">
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
                                        @foreach($therapyAppointmentCancellled as $key=>$allTherapyAppointmentDateAndTimeList)

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

                            <td class="phone"><form method="post" action="{{ route('therapyStatusUpdate') }}">
                                @csrf
                                                                                    <select class="form-control" name="status">
                                                                                        <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                        <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                        <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                        <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                        <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                        <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                                                    </select>
                                                                                    <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->status }}" name="id" />
                                                                                    <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                            </form></td>
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
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="documents" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <table  class="display table table-bordered" style="width:100%">
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
                                        @foreach($therapyAppointmentComplete as $key=>$allTherapyAppointmentDateAndTimeList)

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
                                <form method="post" action="{{ route('therapyStatusUpdate') }}">
                                    @csrf
                                                                                        <select class="form-control" name="status">
                                                                                            <option value="Pending" {{ 'Pending' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Pending</option>
                                                                                            <option value="Therapy Ingredient Request" {{ 'Therapy Ingredient Request' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Therapy Ingredient Request</option>
                                                                                            <option value="Ongoing Ingredient" {{ 'Ongoing Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Ingredient</option>
                                                                                            <option value="Ready Ingredient" {{ 'Ready Ingredient' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ready Ingredient</option>
                                                                                            <option value="Ongoing Therapy" {{ 'Ongoing Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>Ongoing Therapy</option>
                                                                                            <option value="End Therapy" {{ 'End Therapy' == $allTherapyAppointmentDateAndTimeList->status ? 'selected':''}}>End Therapy</option>
                                                                                        </select>
                                                                                        <input type="hidden" value="{{ $allTherapyAppointmentDateAndTimeList->id }}" name="id" />
                                                                                        <button type="submit" class="btn btn-info btn-sm mt-2">Update</button>
                                </form>
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
                        <!--end tab-pane-->
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div><!-- container-fluid -->
</div><!-- End Page-content -->
@endsection



@section('script')

@endsection
