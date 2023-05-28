@extends('admin.master.master')

@section('title')
Create Agrement Form One  | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Agrement Form One Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Agrement Form One</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">


                    <div class="card-body">
                        <form action="{{ route('agreementFormOne.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12">
                            <label for="" class="form-label">Patient Id</label>
                            <select class="js-example-basic-single form-control" name="patient_id" id="patient_id" required>
                                <option >--Please Select-----</option>
                                @foreach($walkByPatientList as $allPatientList)
                                <option value="{{ $allPatientList->patient_reg_id }}"
                                >{{ $allPatientList->patient_reg_id }}</option>
                                                                     @endforeach

                                @foreach($patientList as $allPatientList)
<option value="{{ $allPatientList->patient_id }}"
>{{ $allPatientList->patient_id }}</option>
                             @endforeach
                            </select>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name ="name" class="form-control" id="" placeholder="Name" required>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Diet chart file</label>
                                <input type="file" name="file" class="form-control" id="" required>
                            </div>


                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Early Morning</label>
                                <input type="text" name ="early_morning" class="form-control" id="" placeholder="Early Morning" required>
                            </div>


                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Brisk Walk</label>
                                <input type="text" name ="brisk_walk" class="form-control" id="" placeholder="Brisk Walk" required>
                            </div>


                            <div class="col-12 mb-2">
                                <label for="" class="form-label">BreakFast</label>
                                <input type="text" name ="breakfast" class="form-control" id="" placeholder="BreakFast" required>
                            </div>


                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Lunch</label>
                                <input type="text" name ="lunch" class="form-control" id="" placeholder="Lunch" required>
                            </div>


                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Evening</label>
                                <input type="text" name ="evening" class="form-control" id="" placeholder="Evening" required>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="" class="form-label">Dinner(8.00pm - 9.00pm)</label>
                                <input type="text" name ="dinner" class="form-control" id="" placeholder="Dinner(8.00pm - 9.00pm)" required>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
