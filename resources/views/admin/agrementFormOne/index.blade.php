@extends('admin.master.master')

@section('title')
Agrement Form one List
@endsection


@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Agrement Form one Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">Agrement Form one Information</li>
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
                        <h4 class="card-title mb-0">Agrement Form one Info</h4>
                    </div><!-- end card header -->

                    <div class="card-body">

                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('agreementFormOne.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New Agrement Form One</button>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection


@section('script')
@endsection
