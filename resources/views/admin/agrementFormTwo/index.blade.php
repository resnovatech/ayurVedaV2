@extends('admin.master.master')

@section('title')
Panchkarma List
@endsection


@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Panchkarma Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">Panchkarma Information</li>
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
                        <h4 class="card-title mb-0">Panchkarma Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">

                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('agreementFormTwo.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New Panchkarma</button>

                                </div>
                            </div>

                        </div>

                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead >
                            <tr>
                                <th >Sl</th>
                                <th>Patient Name</th>
                                <th>Patient Opd No</th>

                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody >

                                @foreach($agrementFormTwoList as $key=>$allAgrementFormTwoList)
                            <tr>

                                <td >{{ $key+1 }}</td>
                                <td >{{ $allAgrementFormTwoList->name }}</td>
                                <td >{{ $allAgrementFormTwoList->opd_no }}</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('agreementFormTwo.show',$allAgrementFormTwoList->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Print</a></li>
                                            <li><a href="{{ route('agreementFormTwo.edit',$allAgrementFormTwoList->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn" onclick="deleteTag({{ $allAgrementFormTwoList->id}})" >
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                </a>
                                                <form id="delete-form-{{ $allAgrementFormTwoList->id }}" action="{{ route('agreementFormTwo.destroy',$allAgrementFormTwoList->id) }}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                                                  @csrf

                                                                              </form>
                                            </li>
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



    </div>
</div>
@endsection


@section('script')
@endsection
