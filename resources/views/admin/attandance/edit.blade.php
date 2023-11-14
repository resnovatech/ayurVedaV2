@extends('admin.master.master')

@section('title')
Update Attandance  | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Update Attandance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                            <li class="breadcrumb-item active">Update Attandance</li>
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


                            <!--new code -->

 <!-- Nav tabs -->
 <ul class="nav nav-pills nav-justified mb-3" role="tablist">
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
            Update
        </a>
    </li>





</ul>
<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">
        <form action="{{ route('attandace.update',$attendanceList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf
@method('PUT')
            <div class="row">
                <div class="col-12 mb-2">
                    <label for="" class="form-label">Name</label>
                    <input type="text" value="{{ $attendanceList->employee_id }}" class="form-control timepicker" name="employee_id"  required>
                </div>


                <div class="col-12 mb-2">
                    <label for="" class="form-label">Date</label>
                    <input type="text" value="{{ $attendanceList->date }}" class="form-control datepicker" name="date"  required>
                </div>


                <div class="col-12 mb-2">
                    <label for="" class="form-label">Check in Time</label>
                    <input type="text" value="{{ $attendanceList->checkintime }}" class="form-control timepicker" name="checkintime"  required>
                </div>

                <div class="col-12 mb-2">
                    <label for="" class="form-label">Check Out Time</label>
                    <input type="text" value="{{ $attendanceList->checkouttime }}" class="form-control timepicker" name="checkouttime"  required>
                </div>


            </div>
            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary w-sm" id="final_button" >Submit
                </button>
            </div>
        </form>

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
<!-- Default Modals -->

@endsection


@section('script')


@endsection
