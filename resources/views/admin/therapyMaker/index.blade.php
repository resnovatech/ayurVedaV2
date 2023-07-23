@extends('admin.master.master')

@section('title')
Therapy Maker List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Therapy Maker List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">Therapy Maker  List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @foreach($therapyAppointmentDetails as $allTherapyAppointmentDetails)

            <?php

            $therapyId = DB::table('therapy_lists')
                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('id');

            $therapyDetailList = DB::table('single_ingredients')
                    ->where('therapy_appointment_detail_id', $allTherapyAppointmentDetails->id)->get();
                    $therapyName = DB::table('therapy_lists')
                    ->where('id', $allTherapyAppointmentDetails->therapy_name)->value('name');
                ?>


            <div class="col-lg-3 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Therapy Name: {{ $therapyName }}</h4>

                    </div><!-- end card header -->
                    <div class="card-body">

                        @foreach($therapyDetailList as $allTherapyDetailList)

                        <?php

                        $therapyDetailListName = DB::table('therapy_ingredients')
                                ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

                            ?>
                            <p>Name : {{$therapyDetailListName}}</p>
                            <p>Quantity : {{ $allTherapyDetailList->quantity }} {{ $allTherapyDetailList->unit }}</p>

                        @endforeach


                    </div>

                </div>
            </div>
            @endforeach

            @foreach($patientTherapy as $allTherapyAppointmentDetails)

            <?php

            $therapyId = DB::table('therapy_lists')
                    ->where('id', $allTherapyAppointmentDetails->name)->value('id');

            $therapyDetailList = DB::table('patient_therapy_details')
                    ->where('patient_therapy_id', $allTherapyAppointmentDetails->id)->get();
                    $therapyName = DB::table('therapy_lists')
                    ->where('id', $allTherapyAppointmentDetails->name)->value('name');
                ?>


            <div class="col-lg-3 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Therapy Name: {{ $therapyName }}</h4>

                    </div><!-- end card header -->
                    <div class="card-body">

                        @foreach($therapyDetailList as $allTherapyDetailList)

                        <?php

                        $therapyDetailListName = DB::table('therapy_ingredients')
                                ->where('id', $allTherapyDetailList->ingredient_name)->value('name');

                            ?>
                            <p>Name : {{$therapyDetailListName}}</p>
                            <p>Quantity : {{ $allTherapyDetailList->quantity }} {{ $allTherapyDetailList->unit }}</p>

                        @endforeach


                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
