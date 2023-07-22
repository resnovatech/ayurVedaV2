@extends('admin.master.master')
@section('title')
Precription Information List | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Precription Info</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Precription</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-xxl-12">
                <div class="card" id="demo">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header border-bottom-dashed p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <img src="{{ asset('/') }}{{ $logo }}" class="card-logo card-logo-dark" alt="logo dark" height="17">
                                        <img src="{{ asset('/') }}{{ $logo }}" class="card-logo card-logo-light" alt="logo light" height="17">



                                        <div class="mt-sm-5 mt-4">
                                            <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                            @if(empty($getPhoneFromWalkByPatient))
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromPatient }}</p>
                                            @else
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromWalkByPatient }}</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-header-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            @include('flash_message')
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    {{-- <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                        <h5 class="fs-14 mb-0">#VL<span id="invoice-no">25000355</span></h5>
                                    </div> --}}
                                    <!--end col-->
                                    <div class="col-lg-4 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                        <h5 class="fs-14 mb-0"><span id="invoice-date">{{ $patientHistory->created_at->format('d F Y') }}</span></h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                        <span class="badge badge-soft-success fs-11" id="payment-status">

                                            @if($getAllPaymentHistoryAmount == ($totalPatientMedicalSupplementAmount + $totalMedicineAmount + $totalTherapyAmount) )
Paid
                                            @else

                                            Unpaid

                                            @endif

                                        </span>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                        <h5 class="fs-14 mb-0">৳ <span id="total-amount">{{$totalPackageAmount +  $totalPatientMedicalSupplementAmount + $totalMedicineAmount + $totalTherapyAmount }}</span></h5>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4 border-top border-top-dashed">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Billing Address</h6>
                                        <p class="fw-medium mb-2" id="billing-name">

                                            @if(empty($getNameFromWalkByPatient))

{{ $getNameFromPatient }}
                                            @else
                                            {{ $getNameFromWalkByPatient }}
                                            @endif

                                        </p>
                                        @if(empty($getPhoneFromWalkByPatient))
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromPatient }}</p>
                                            @else
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromWalkByPatient }}</p>
                                            @endif
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                        <tr class="table-active">

                                            <th scope="col">Product Details</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Rate</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col" class="text-end">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody id="products-list">
                                            <?php

                                            $countData = count($patientTherapyList);
                                            $countpatientTherapyList = count($patientTherapyList);
                                            $getPatientTheraPrice =0;
                                            ?>


                                            @foreach($patientTherapyList as $key=>$allPatientTherapyList)

                                            <?php
$getTherapyPriceName = DB::table('therapy_lists')->where('id',$allPatientTherapyList->name)->value('name');
$getPackage = DB::table('therapy_packages')->where('id',$allPatientTherapyList->package_name)->value('package_name');
$getPatientTheraPrice = DB::table('therapy_packages')->where('id',$allPatientTherapyList->package_name)->value('price');

                                              ?>
                                        <tr>

                                            <td class="text-start">
                                                <span class="fw-medium">{{ $getTherapyPriceName }}({{ $getPackage }})</span>

                                            </td>
                                            <td>Therapy</td>
                                            @if(($key+1) == $countpatientTherapyList)

                                            <td>৳ {{ $getPatientTheraPrice }}</td>

                                            @else
<td></td>
                                            @endif

                                            <td>{{ $allPatientTherapyList->amount }}</td>
                                            @if(($key+1) == $countpatientTherapyList)

                                            <td class="text-end">৳ {{ $allPatientTherapyList->amount*$getPatientTheraPrice }}</td>

                                            @else
<td></td>
                                            @endif
                                        </tr>
                                        @endforeach

                                        @foreach($patientTherapyListSingle as $key=>$allPatientTherapyList)

                                        <?php
$getTherapyPrice = DB::table('therapy_lists')->where('id',$allPatientTherapyList->name)->value('amount');
$getTherapyPriceName = DB::table('therapy_lists')->where('id',$allPatientTherapyList->name)->value('name');
                                          ?>
                                    <tr>

                                        <td class="text-start">
                                            <span class="fw-medium">{{ $getTherapyPriceName}}</span>

                                        </td>
                                        <td>Therapy</td>
                                        <td>৳ {{ $getTherapyPrice }}</td>
                                        <td>{{ $allPatientTherapyList->amount }}</td>
                                        <td class="text-end">৳ {{ $allPatientTherapyList->amount*$getTherapyPrice }}</td>
                                    </tr>
                                    @endforeach


                                        <?php

                                        $countData = count($patientTherapyList);
                                        $countpatientHerb = count($patientHerb);
                                        $getPatientHerb =0;
                                        ?>

                                        @foreach($patientHerb as $key=>$allPatientHerbList)
                                        <?php
$getPatientHerb = DB::table('medicines')->where('name',$allPatientHerbList->name)->value('amount');
$getPackage = DB::table('packages')->where('id',$allPatientHerbList->package_name)->value('name');
$getPatientHerb = DB::table('packages')->where('id',$allPatientHerbList->package_name)->value('amount');
                                        ?>
                                        <tr>

                                            <td class="text-start">
                                                <span class="fw-medium">{{ $allPatientHerbList->name }}({{ $getPackage }})</span>

                                            </td>
                                               <td>Medicine</td>

                                               @if(($key+1) == $countpatientHerb)

                                            <td>৳ {{ $getPatientHerb }}</td>

                                            @else
<td></td>
                                            @endif


                                            <td>{{ $allPatientHerbList->how_many_dose }}</td>
                                            @if(($key+1) == $countpatientHerb)
                                            <td class="text-end">৳ {{ $getPatientHerb }}</td>


                                            @else
<td class="text-end"></td>
                                            @endif
                                        </tr>
                                        @endforeach


                                        @foreach($patientPackage as $allPatientHerbList)
                                        <?php
$getPatientPackage = DB::table('packages')->where('name',$allPatientHerbList->name)->value('amount');
                                        ?>
                                        <tr>

                                            <td class="text-start">
                                                <span class="fw-medium">{{ $allPatientHerbList->name }}</span>

                                            </td>
                                               <td>Package</td>
                                            <td>৳ {{ $getPatientPackage }}</td>
                                            <td>{{ $allPatientHerbList->how_many_dose }}</td>
                                            <td class="text-end">৳ {{ $allPatientHerbList->how_many_dose*$getPatientPackage }}</td>
                                        </tr>
                                        @endforeach



                                        @foreach($patientMedicalSupplement as $allPatientMedicalSupplement)

                                        <?php
$getPatientMedicalSupplement =DB::table('health_supplements')->where('name',$allPatientMedicalSupplement->name)->value('amount');
                                        ?>
                                        <tr>

                                            <td class="text-start">
                                                <span class="fw-medium">{{ $allPatientMedicalSupplement->name }}</span>

                                            </td>
                                               <td>Health Suppliment</td>
                                            <td>৳ {{ $getPatientMedicalSupplement }}</td>
                                            <td>{{ $allPatientMedicalSupplement->quantity }}</td>
                                            <td class="text-end">৳ {{ $getPatientMedicalSupplement*$allPatientMedicalSupplement->quantity  }}</td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                        <tbody>
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-end">৳ {{$totalTherapyAmountsingle +  $totalPackageAmount + $totalPatientMedicalSupplementAmount + $totalMedicineAmount + $totalTherapyAmount }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>

                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                    {{-- <a href="javascript:window.print()" class="btn btn-soft-primary"><i class="ri-printer-line align-bottom me-1"></i> Print</a> --}}

                                </div>
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <!--end card-->
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xxl-12">
                <div class="card" >
                    <div class="card-header" >
                        Payment history
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                <thead>
                                <tr class="table-active">

                                    <th scope="col">SL</th>
                                    <th scope="col">Payment type</th>
                                    <th scope="col">Payment Cash</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($getAllPaymentHistory as $key=>$allGetAllPaymentHistory)
                                    <tr>
                                        <th>{{ $key+1 }}</th>
<th>{{ $allGetAllPaymentHistory->payment_type }}</th>
<th>{{ $allGetAllPaymentHistory->payment_amount }}</th>
<th>{{ $allGetAllPaymentHistory->created_at->format('d F Y') }}</th>
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
    <!-- container-fluid -->
</div>
@endsection


@section('script')

@endsection
