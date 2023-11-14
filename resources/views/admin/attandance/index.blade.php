@extends('admin.master.master')
@section('title')
Attandance List | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Attandance List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Attandance</li>
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
                        <h4 class="card-title mb-0">Attandance Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('attandace.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New Info</button>
                                </div>

                            </div>


                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Sl</th>
                                        <th class="sort" data-sort="customer_name">Name</th>
                                        <th class="sort" data-sort="customer_name">Date</th>
                                        <th class="sort" data-sort="email">CheckIn</th>
                                        <th class="sort" data-sort="phone">CheckOut</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @foreach($attendanceList as $key=>$attendanceList)
                                    <tr>

                                        <td class="customer_name">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $attendanceList->employee_id }}</td>
                                        <td class="email">{{ $attendanceList->date }}</td>
                                        <td class="email">{{ $attendanceList->checkintime }}</td>
                                        <td class="phone">{{ $attendanceList->checkouttime }}</td>

                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">

                                                    @if (Auth::guard('admin')->user()->can('attandaceUpdate'))
                                                    <li><a class="dropdown-item edit-item-btn" href="{{ route('attandace.edit',$attendanceList->id) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    @endif
                                                    @if (Auth::guard('admin')->user()->can('attandaceDelete'))
                                                    <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $attendanceList->id}})" >
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $attendanceList->id }}" action="{{ route('attandace.destroy',$attendanceList->id) }}" method="POST" style="display: none;">
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
