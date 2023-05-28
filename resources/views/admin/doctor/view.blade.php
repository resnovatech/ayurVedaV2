@extends('admin.master.master')

@section('title')
Doctor Profile | {{ $ins_name }}
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
                        <h3 class="text-white mb-1">{{ $doctorList->name}}</h3>
                        <p class="text-white-75">Doctor</p>
                        <div class="hstack text-white-50 gap-1">
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{ $doctorList->address}}</div>

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
                        <div class="flex-shrink-0">
                            <a href="{{ route('doctors.edit',$doctorList->id) }}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                        </div>
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
                                                            <td class="text-muted">{{ $doctorList->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                            <td class="text-muted">{{ $doctorList->phone_or_mobile_number}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{ $doctorList->email_address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">NID Number:</th>
                                                            <td class="text-muted">{{ $doctorList->nid_number}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Nationality</th>
                                                            <td class="text-muted">{{ $doctorList->nationality}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Year Of Experience</th>
                                                            <td class="text-muted">{{ $doctorList->years_of_experience}}</td>
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
                                                                    Tomorrow
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab" href="#monthly" role="tab">
                                                                    Yesterday
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
                                                                    <th class="sort" data-sort="customer_name">Serial Number</th>
                                                                    <th class="sort" data-sort="customer_name">Patient Id</th>
                                                                    <th class="sort" data-sort="email">Doctor Name</th>
                                                                    <th class="sort" data-sort="phone">Appointment Date</th>
                                                                    <th class="sort" data-sort="phone">Appointment Time</th>
                                                                    <th class="sort" data-sort="action">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="list form-check-all">
                                                                @foreach($doctorAppointmentListToday as $key=>$allDoctorAppointmentList)
                                                                <tr>


                                                                    <td class="customer_name">{{ $allDoctorAppointmentList->serial_number }}</td>
                                                                    <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                                                    <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                                                    <td class="phone">{{ $allDoctorAppointmentList->appointment_date }}</td>
                                                                    <td class="phone">{{ $allDoctorAppointmentList->appointment_time }}</td>

                                                                    <td>
                                                                        <div class="dropdown d-inline-block">
                                                                            <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-fill align-middle"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                                @if (Auth::guard('admin')->user()->can('doctorAppointmentUpdate'))
                                                                                <li><a class="dropdown-item edit-item-btn" href="{{ route('doctorAppointments.edit',$allDoctorAppointmentList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                                @endif
                                                                                @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                                                <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                                </a>
                                                                                <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('doctorAppointments.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
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
                                                        <div class="tab-pane" id="weekly" role="tabpanel">
                                                            <table  class="display table table-bordered" style="width:100%">
                                                                <thead class="table-light">
                                                                <tr>
                                                                    <th class="sort" data-sort="customer_name">Serial Number</th>
                                                                    <th class="sort" data-sort="customer_name">Patient Id</th>
                                                                    <th class="sort" data-sort="email">Doctor Name</th>
                                                                    <th class="sort" data-sort="phone">Appointment Date</th>
                                                                    <th class="sort" data-sort="phone">Appointment Time</th>
                                                                    <th class="sort" data-sort="action">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="list form-check-all">
                                                                @foreach($doctorAppointmentListTomorrow as $key=>$allDoctorAppointmentList)
                                                                <tr>


                                                                    <td class="customer_name">{{ $allDoctorAppointmentList->serial_number }}</td>
                                                                    <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                                                    <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                                                    <td class="phone">{{ $allDoctorAppointmentList->appointment_date }}</td>
                                                                    <td class="phone">{{ $allDoctorAppointmentList->appointment_time }}</td>

                                                                    <td>
                                                                        <div class="dropdown d-inline-block">
                                                                            <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-fill align-middle"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                                @if (Auth::guard('admin')->user()->can('doctorAppointmentUpdate'))
                                                                                <li><a class="dropdown-item edit-item-btn" href="{{ route('doctorAppointments.edit',$allDoctorAppointmentList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                                @endif
                                                                                @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                                                <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                                </a>
                                                                                <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('doctorAppointments.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
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
                                                        <div class="tab-pane" id="monthly" role="tabpanel">
                                                            <table  class="display table table-bordered" style="width:100%">
                                                                <thead class="table-light">
                                                                <tr>
                                                                    <th class="sort" data-sort="customer_name">Serial Number</th>
                                                                    <th class="sort" data-sort="customer_name">Patient Id</th>
                                                                    <th class="sort" data-sort="email">Doctor Name</th>
                                                                    <th class="sort" data-sort="phone">Appointment Date</th>
                                                                    <th class="sort" data-sort="phone">Appointment Time</th>
                                                                    <th class="sort" data-sort="action">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="list form-check-all">
                                                                @foreach($doctorAppointmentListYesterday as $key=>$allDoctorAppointmentList)
                                                                <tr>


                                                                    <td class="customer_name">{{ $allDoctorAppointmentList->serial_number }}</td>
                                                                    <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                                                    <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                                                    <td class="phone">{{ $allDoctorAppointmentList->appointment_date }}</td>
                                                                    <td class="phone">{{ $allDoctorAppointmentList->appointment_time }}</td>

                                                                    <td>
                                                                        <div class="dropdown d-inline-block">
                                                                            <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-fill align-middle"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                                @if (Auth::guard('admin')->user()->can('doctorAppointmentUpdate'))
                                                                                <li><a class="dropdown-item edit-item-btn" href="{{ route('doctorAppointments.edit',$allDoctorAppointmentList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                                @endif
                                                                                @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                                                <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                                </a>
                                                                                <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('doctorAppointments.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
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
                                            <th class="sort" data-sort="customer_name">Serial Number</th>
                                            <th class="sort" data-sort="customer_name">Patient Id</th>
                                            <th class="sort" data-sort="email">Doctor Name</th>
                                            <th class="sort" data-sort="phone">Appointment Date</th>
                                            <th class="sort" data-sort="phone">Appointment Time</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($doctorAppointmentPending as $key=>$allDoctorAppointmentList)
                                        <tr>


                                            <td class="customer_name">{{ $allDoctorAppointmentList->serial_number }}</td>
                                            <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                            <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                            <td class="phone">{{ $allDoctorAppointmentList->appointment_date }}</td>
                                            <td class="phone">{{ $allDoctorAppointmentList->appointment_time }}</td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">

                                                        @if (Auth::guard('admin')->user()->can('doctorAppointmentUpdate'))
                                                        <li><a class="dropdown-item edit-item-btn" href="{{ route('doctorAppointments.edit',$allDoctorAppointmentList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                        @endif
                                                        @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                        <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                        <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('doctorAppointments.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
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
                                            <th class="sort" data-sort="customer_name">Serial Number</th>
                                            <th class="sort" data-sort="customer_name">Patient Id</th>
                                            <th class="sort" data-sort="email">Doctor Name</th>
                                            <th class="sort" data-sort="phone">Appointment Date</th>
                                            <th class="sort" data-sort="phone">Appointment Time</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($doctorAppointmentCancellled as $key=>$allDoctorAppointmentList)
                                        <tr>


                                            <td class="customer_name">{{ $allDoctorAppointmentList->serial_number }}</td>
                                            <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                            <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                            <td class="phone">{{ $allDoctorAppointmentList->appointment_date }}</td>
                                            <td class="phone">{{ $allDoctorAppointmentList->appointment_time }}</td>

                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">

                                                        @if (Auth::guard('admin')->user()->can('doctorAppointmentUpdate'))
                                                        <li><a class="dropdown-item edit-item-btn" href="{{ route('doctorAppointments.edit',$allDoctorAppointmentList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                        @endif
                                                        @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                        <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                        <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('doctorAppointments.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
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
                                    <div class="d-flex align-items-center mb-4">

                                        <table  class="display table table-bordered" style="width:100%">
                                            <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">Serial Number</th>
                                                <th class="sort" data-sort="customer_name">Patient Id</th>
                                                <th class="sort" data-sort="email">Doctor Name</th>
                                                <th class="sort" data-sort="phone">Appointment Date</th>
                                                <th class="sort" data-sort="phone">Appointment Time</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                            @foreach($doctorAppointmentComplete as $key=>$allDoctorAppointmentList)
                                            <tr>


                                                <td class="customer_name">{{ $allDoctorAppointmentList->serial_number }}</td>
                                                <td class="email">{{ $allDoctorAppointmentList->patient_id }}</td>
                                                <td class="email">{{ $allDoctorAppointmentList->doctor->name }}</td>
                                                <td class="phone">{{ $allDoctorAppointmentList->appointment_date }}</td>
                                                <td class="phone">{{ $allDoctorAppointmentList->appointment_time }}</td>

                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">

                                                            @if (Auth::guard('admin')->user()->can('doctorAppointmentUpdate'))
                                                            <li><a class="dropdown-item edit-item-btn" href="{{ route('doctorAppointments.edit',$allDoctorAppointmentList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                            @endif
                                                            @if (Auth::guard('admin')->user()->can('doctorAppointmentDelete'))
                                                            <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allDoctorAppointmentList->id}})" >
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $allDoctorAppointmentList->id }}" action="{{ route('doctorAppointments.destroy',$allDoctorAppointmentList->id) }}" method="POST" style="display: none;">
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
