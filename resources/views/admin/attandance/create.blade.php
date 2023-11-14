@extends('admin.master.master')

@section('title')
Add Attandance  | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Attandance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                            <li class="breadcrumb-item active">Add Attandance</li>
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
            CheckIn
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
            CheckOut
        </a>
    </li>




</ul>
<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">
        <form action="{{ route('attandace.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf

            <div class="row">
                <div class="col-12 mb-2">
                    <label for="" class="form-label">Name</label>
                    <select name ="name" class="form-control js-example-basic-single" id="" placeholder="Name" required>
                        <option value="">--Please Select--</option>
                        @foreach($staffList as $staffListAll)
                         <option value="{{$staffListAll->name}}({{$staffListAll->phone_or_mobile_number}})">{{$staffListAll->name}}({{ $staffListAll->phone_or_mobile_number }})</option>
                        @endforeach
                        @foreach($therapistList as $staffListAll)
                        <option value="{{$staffListAll->name}}({{$staffListAll->phone_or_mobile_number}})">{{$staffListAll->name}}({{ $staffListAll->phone_or_mobile_number }})</option>
                       @endforeach
                       @foreach($doctorList as $staffListAll)
                       <option value="{{$staffListAll->name}}({{$staffListAll->phone_or_mobile_number}})">{{$staffListAll->name}}({{ $staffListAll->phone_or_mobile_number }})</option>
                      @endforeach
                    </select>
                </div>


                <div class="col-12 mb-2">
                    <label for="" class="form-label">Date</label>
                    <input type="text" value="<?php echo date('Y-m-d') ?>" class="form-control datepicker" name="date"  required>
                </div>


                <div class="col-12 mb-2">
                    <label for="" class="form-label">Time</label>
                    <input type="text" class="form-control timepicker" name="checkintime"  required>
                </div>

            </div>
            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary w-sm" id="final_button" >Submit
                </button>
            </div>
        </form>

    </div>
    <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">

        <form action="{{ route('attandace.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf

            <div class="row">
                <div class="col-12 mb-2">
                    <label for="" class="form-label">Name</label>
                    <select name ="name" class="form-control js-example-basic-single" id="" placeholder="Name" required>
                        <option value="">--Please Select--</option>
                        @foreach($attendanceList as $staffListAll)
                         <option value="{{$staffListAll->id}}">{{$staffListAll->employee_id}}</option>
                        @endforeach

                    </select>
                </div>





                <div class="col-12 mb-2">
                    <label for="" class="form-label">Time</label>
                    <input type="text" class="form-control timepicker" name="checkouttime"  required>
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
