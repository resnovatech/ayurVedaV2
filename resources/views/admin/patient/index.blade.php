@extends('admin.master.master')

@section('title')
 Patient List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Patient List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Patient</li>
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
                        <h4 class="card-title mb-0">Patient Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <!--<div>-->
                                    <!--    <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('patients.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New Patient</button>-->

                                    <!--</div>-->
                                </div>

                            </div>
                            
                                                        <!--new code -->

 <!-- Nav tabs -->
 <ul class="nav nav-pills nav-justified mb-3" role="tablist">
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
            All
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
            Walking Patient
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-messages-1" role="tab">
            Patient
        </a>
    </li>
    
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-messages-12" role="tab">
            Patient Admit
        </a>
    </li>

</ul>
<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">
        
                  <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <!--<th class="sort" data-sort="customer_name">SL</th>-->
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Phone</th>
                                        <th class="sort" data-sort="date">Appoint Date</th>
                                        <th class="sort" data-sort="status">Service Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @foreach($patientList as $key=>$allPatientList)
                                    <tr>

                                        <!--<td class="id">{{ $key+1 }}</td>-->
                                        <td class="customer_name">{{ $allPatientList->name }}</td>
                                        <td class="email">{{ $allPatientList->email_address }}</td>
                                        <td class="phone">{{ $allPatientList->phone_or_mobile_number }}</td>
                                        <td class="date">{{ $allPatientList->created_at }}</td>
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (Auth::guard('admin')->user()->can('patientView'))
                                                    <li><a href="{{ route('patients.show',$allPatientList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('patients.edit',$allPatientList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allPatientList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allPatientList->id }}" action="{{ route('patients.destroy',$allPatientList->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                                                      @csrf

                                                                                  </form>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
@endforeach
                        @foreach($walkByPatientList as $key=>$allWalkByPatientList)
                                    <tr>

                                        <!--<td class="id">{{ $key+1 }}</td>-->
                                        <td class="customer_name">{{ $allWalkByPatientList->name }}</td>
                                        <td class="email">{{ $allWalkByPatientList->email_address }}</td>
                                        <td class="phone">{{ $allWalkByPatientList->phone_or_mobile_number }}</td>
                                        <td class="date">{{ $allWalkByPatientList->created_at }}</td>
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (Auth::guard('admin')->user()->can('walkByPatientView'))
                                                    <li><a href="{{ route('transferToPatientList',$allWalkByPatientList->id) }}" class="dropdown-item"><i class="ri-file-fill align-bottom me-2 text-muted"></i>Transfer</a></li>
                                                    <li><a href="{{ route('walkByPatients.show',$allWalkByPatientList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('walkByPatientUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('walkByPatients.edit',$allWalkByPatientList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('walkByPatientDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allWalkByPatientList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allWalkByPatientList->id }}" action="{{ route('walkByPatients.destroy',$allWalkByPatientList->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                                                      @csrf

                                                                                  </form>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
@endforeach
                        @foreach($patientAdmitList as $key=>$allPatientAdmitList)
                                    <tr>

                                        <!--<td class="id">{{ $key+1 }}</td>-->
                                        <td class="customer_name">{{ $allPatientAdmitList->name }}</td>
                                        <td class="email">{{ $allPatientAdmitList->email_address }}</td>
                                        <td class="phone">{{ $allPatientAdmitList->phone_or_mobile_number }}</td>
                                        <td class="date">{{ $allPatientAdmitList->created_at }}</td>
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (Auth::guard('admin')->user()->can('patientAdmitView'))
                                                    <li><a href="{{ route('patientAdmits.show',$allPatientAdmitList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientAdmitUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('patientAdmits.edit',$allPatientAdmitList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientAdmitDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allPatientAdmitList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allPatientAdmitList->id }}" action="{{ route('patientAdmits.destroy',$allPatientAdmitList->id) }}" method="POST" style="display: none;">
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
        
        <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">
            
              <table id="example" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">SL</th>
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Phone</th>
                                        <th class="sort" data-sort="date">Appoint Date</th>
                                        <th class="sort" data-sort="status">Service Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @foreach($walkByPatientList as $key=>$allWalkByPatientList)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allWalkByPatientList->name }}</td>
                                        <td class="email">{{ $allWalkByPatientList->email_address }}</td>
                                        <td class="phone">{{ $allWalkByPatientList->phone_or_mobile_number }}</td>
                                        <td class="date">{{ $allWalkByPatientList->created_at }}</td>
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (Auth::guard('admin')->user()->can('walkByPatientView'))
                                                    <li><a href="{{ route('transferToPatientList',$allWalkByPatientList->id) }}" class="dropdown-item"><i class="ri-file-fill align-bottom me-2 text-muted"></i>Transfer</a></li>
                                                    <li><a href="{{ route('walkByPatients.show',$allWalkByPatientList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('walkByPatientUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('walkByPatients.edit',$allWalkByPatientList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('walkByPatientDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allWalkByPatientList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allWalkByPatientList->id }}" action="{{ route('walkByPatients.destroy',$allWalkByPatientList->id) }}" method="POST" style="display: none;">
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
            
             <div class="tab-pane" id="pill-justified-messages-1" role="tabpanel">
                 
                     <table id="alternative-pagination" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">SL</th>
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Phone</th>
                                        <th class="sort" data-sort="date">Appoint Date</th>
                                        <th class="sort" data-sort="status">Service Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @foreach($patientList as $key=>$allPatientList)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allPatientList->name }}</td>
                                        <td class="email">{{ $allPatientList->email_address }}</td>
                                        <td class="phone">{{ $allPatientList->phone_or_mobile_number }}</td>
                                        <td class="date">{{ $allPatientList->created_at }}</td>
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (Auth::guard('admin')->user()->can('patientView'))
                                                    <li><a href="{{ route('patients.show',$allPatientList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('patients.edit',$allPatientList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allPatientList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allPatientList->id }}" action="{{ route('patients.destroy',$allPatientList->id) }}" method="POST" style="display: none;">
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
            
             <div class="tab-pane" id="pill-justified-messages-12" role="tabpanel">
                 
                 <table id="fixed-header" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">SL</th>
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="email">Email</th>
                                        <th class="sort" data-sort="phone">Phone</th>
                                        <th class="sort" data-sort="date">Appoint Date</th>
                                        <th class="sort" data-sort="status">Service Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @foreach($patientAdmitList as $key=>$allPatientAdmitList)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allPatientAdmitList->name }}</td>
                                        <td class="email">{{ $allPatientAdmitList->email_address }}</td>
                                        <td class="phone">{{ $allPatientAdmitList->phone_or_mobile_number }}</td>
                                        <td class="date">{{ $allPatientAdmitList->created_at }}</td>
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (Auth::guard('admin')->user()->can('patientAdmitView'))
                                                    <li><a href="{{ route('patientAdmits.show',$allPatientAdmitList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientAdmitUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('patientAdmits.edit',$allPatientAdmitList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('patientAdmitDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allPatientAdmitList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $allPatientAdmitList->id }}" action="{{ route('patientAdmits.destroy',$allPatientAdmitList->id) }}" method="POST" style="display: none;">
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
<!--end new code -->


                      




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
