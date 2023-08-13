@extends('admin.master.master')
@section('title')
Billing Information List | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Billing List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Billing</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xxl-12">
                <div class="card" >
                    <div class="card-body" >
                        <div class="btn-group">
                            <a href="{{ route('printInvoice',$patientHistory->id) }}" class="btn btn-primary">Print</a>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Payment</button>

                            <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('paymentMoney') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                @csrf

                <label for="" class="form-label">Payment type</label>
                <select class="form-control" name="payment_type" id="payment_type" required>
                    <option value="cash">cash</option>
                    <option value="check">check</option>
                </select>

                <label for="" class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" id="" value="" >
                <input type="hidden" class="form-control" name="id" id="" value="{{ $patientHistory->id }}" >

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>

      </div>
    </div>
  </div>
  <a href ="{{ route('medicineList',$patientHistory->id) }}" class="btn btn-info">Medicine List</a>
                            <a href ="{{ route('therapyListFromHistory',$patientHistory->id) }}" class="btn btn-info">Therapy List</a>
                          </div>

                    </div>
                </div>
            </div>
        </div>
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
                                        <h5 class="fs-14 mb-0">৳ <span id="total-amount">{{ $mainTotal}}</span></h5>
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
                                <form action="{{ route('revisedBillings.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                    @csrf
                                <div class="table-responsive">
                                    <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                        <tr class="table-active">

                                            <th scope="col">Product Details</th>


                                            <th scope="col">Rate</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col" class="text-end">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody id="products-list">
                                            <?php
                                            $countSingleFacePackageList = count($singleFacePackageList);
                                                           $totalFacialAmount = 0 ;

                                                                                           ?>
                                                     @foreach($singleFacePackageList as $allSingleFacePackageList)
                                           <?php
                                            $getFacePack = DB::table('face_packs')->where('id',$allSingleFacePackageList->face_pack_id)->value('amount');
                                            $getFacePackName = DB::table('face_packs')->where('id',$allSingleFacePackageList->face_pack_id)->value('pack_name');
                                           ?>
                                           <tr>
                                           <td class="text-start">
                                               <span class="fw-medium">{{ $getFacePackName}}</span>

                                           </td>
                                           <td>Face Pack</td>
                                           <td>৳ {{ $getFacePack }}</td>

                                           <td>

                                            <input type="hidden" name="new_face_pack_id[]" value="{{ $allSingleFacePackageList->id }}"/>
                                            <input type="text" class="form-control form-control-sm" name="new_face_pack_quantity[]" value="{{ $allSingleFacePackageList->quantity }}"/>



                                        </td>

                                           <td>{{ $allSingleFacePackageList->quantity*$getFacePack }}</td>
                                           </tr>
                                                     @endforeach
                                            <?php


 $countpatientTherapyList1 = count($singlePackageList);
 $totalTherapyAmount1 = 0 ;
 $totalTherapyAmountsingle1 = 0 ;
 ?>
 <!-- new code -->
 @foreach($singlePackageList as $key=>$allPatientTherapyList)
 <?php
     $getTherapyPriceName1 = DB::table('therapy_lists')->where('name',$allPatientTherapyList->name)->value('name');
     $getPackage1 = DB::table('therapy_packages')->where('id',$allPatientTherapyList->therapy_package_id)->value('package_name');
     $getPatientTheraPrice1 = DB::table('therapy_packages')->where('id',$allPatientTherapyList->therapy_package_id)->value('price');

     ?>

<tr>

    <td class="text-start">
        <span class="fw-medium">{{ $getTherapyPriceName1 }}({{ $getPackage1 }})</span>

    </td>


    @if(($key+1) == $countpatientTherapyList1)

    <td>৳ {{ $getPatientTheraPrice1 }}</td>

    @else
<td></td>
    @endif

    <td>



        <input type="hidden" name="new_therapy_id[]" value="{{ $allPatientTherapyList->id }}"/>
        <input type="text" class="form-control form-control-sm" name="new_therapy_amount[]" value="{{ $allPatientTherapyList->amount }}"/>


    </td>
    @if(($key+1) == $countpatientTherapyList1)

    <td class="text-end">৳ {{ $allPatientTherapyList->amount*$getPatientTheraPrice1 }}</td>

    @else
<td></td>
    @endif


</tr>

 @endforeach

<!-- endpackage -->

<!-- single-->
<?
$totalTheAmountsingle = 0;
?>
@foreach($singleTheList as $key=>$allPatientTherapyList)
<?php
    $getTherapyPrices = DB::table('therapy_lists')->where('name',$allPatientTherapyList->name)->value('amount');
$getTherapyPriceNames = DB::table('therapy_lists')->where('name',$allPatientTherapyList->name)->value('name');
?>
<tr>

    <td class="text-start">
        <span class="fw-medium">{{ $getTherapyPriceNames}}</span>

    </td>

    <td>৳ {{ $getTherapyPrices }}</td>
    <td>



        <input type="hidden" name="new_therapy_id[]" value="{{ $allPatientTherapyList->id }}"/>
        <input type="text" class="form-control form-control-sm" name="new_therapy_amount[]" value="{{ $allPatientTherapyList->amount }}"/>



    </td>
    <td class="text-end">৳ {{ $allPatientTherapyList->amount*$getTherapyPrices }}</td>
</tr>

@endforeach

<!--endsingle-->


<!--end new code-->

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

                                            @if(($key+1) == $countpatientTherapyList)

                                            <td>৳ {{ $getPatientTheraPrice }}</td>

                                            @else
<td></td>
                                            @endif

                                            <td>

                                                <input type="hidden" name="therapy_id[]" value="{{ $allPatientTherapyList->id }}"/>
                                                <input type="text" class="form-control form-control-sm" name="therapy_amount[]" value="{{ $allPatientTherapyList->amount }}"/>

                                            </td>
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

                                        <td>৳ {{ $getTherapyPrice }}</td>
                                        <td>
                                            <input type="hidden" name="therapy_id[]" value="{{ $allPatientTherapyList->id }}"/>
                                            <input type="text" class="form-control form-control-sm" name="therapy_amount[]" value="{{ $allPatientTherapyList->amount }}"/>





                                        </td>
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


                                               @if(($key+1) == $countpatientHerb)

                                            <td>৳ {{ $getPatientHerb }}</td>

                                            @else
<td></td>
                                            @endif


                                            <td>

                                                <input type="hidden" name="herb_id[]" value="{{ $allPatientHerbList->id }}"/>
                                                <input type="text" class="form-control form-control-sm" name="herb_amount[]" value="{{ $allPatientHerbList->how_many_dose }}"/>




                                            </td>
                                            @if(($key+1) == $countpatientHerb)
                                            <td class="text-end">৳ {{ $getPatientHerb }}</td>


                                            @else
<td class="text-end"></td>
                                            @endif
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

                                            <td>৳ {{ $getPatientMedicalSupplement }}</td>
                                            <td>
<input type="hidden" name="suppliment_id[]" value="{{ $allPatientMedicalSupplement->id }}"/>
<input type="text" class="form-control form-control-sm" name="suppliment_amount[]" value="{{ $allPatientMedicalSupplement->quantity }}"/>



                                            </td>
                                            <td class="text-end">৳ {{ $getPatientMedicalSupplement*$allPatientMedicalSupplement->quantity  }}</td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                </form>
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                        <tbody>
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-end">৳ {{ $mainTotal }}</td>
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
