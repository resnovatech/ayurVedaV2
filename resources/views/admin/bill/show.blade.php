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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <?php  
             
              $dueStatus = DB::table('payments')->where('bill_id',$patientHistory->id )->orderBy('id','desc')->value('status');
              $dueAmount = DB::table('payments')->where('bill_id',$patientHistory->id )->orderBy('id','desc')->value('due_amount');
              $grandTotal = DB::table('payments')->where('bill_id',$patientHistory->id )->orderBy('id','desc')->value('grand_total');
            
            //dd($dueAmount);
            ?>
            
         @if(empty($dueStatus))
            <form action="{{ route('paymentMoney') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                @csrf
                
                <div class="row">
                     <div class="col-md-6">
                             <label for="" class="form-label">Payment type</label>
                <select class="form-control" name="payment_type" id="payment_type" required>
                     <option value="">--- Select One ---</option>
                     <option value="Mobile Banking">Mobile Banking</option>
                    <option value="cash">cash</option>
                    <option value="check">check</option>
                    <option value="card">card</option>
                </select>
                    </div>
                    
                     <div class="col-md-6">
                                <label for="" class="form-label">Total Amount</label>
                <input type="number" readonly class="form-control" name="amount" id="amount" value="{{$totalFacialAmount + $totalTheAmountsingle + $totalTherapyAmount1 + $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount }}" >
                <input type="hidden" class="form-control" name="id" id="" value="{{ $patientHistory->id }}" >
                    </div>
                    
                    <!--discount code-->
                     <div class="col-md-3 mt-2">
                             <label for="" class="form-label">Discount</label>
                <select class="form-control" name="main_discount" id="main_discount" required>
                   
                     <option value="No" >No</option>
                    <option value="Yes">Yes</option>
                 </select>
                    </div>
                    
                    <?php   
                    $newMainTotal = $totalFacialAmount + $totalTheAmountsingle + $totalTherapyAmount1 + $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount;
                    $allDiscountLists = DB::table('discounts')->latest()->get();
                    $allVat = DB::table('vats')->orderBy('id','desc')->value('amount');
                    
                    $phpVatCal = ($newMainTotal*$allVat) / 100;
                    
                    $finalPhpVal = $newMainTotal +  $phpVatCal;
                    ?>
                    
                    <div class="col-md-3 mt-2">
                             <label for="" class="form-label">All Discount</label>
                <select class="form-control" name="all_discount" id="all_discount" disabled>
                      <option value="">--- Select One ---</option>
                   @foreach($allDiscountLists as $mainDis)
                     <option value="{{$mainDis->amount}}" >{{$mainDis->amount}}%({{$mainDis->client_type}})</option>
                     @endforeach
                     </select>
                 
                    </div>
                    
                    
                      <div class="col-md-3 mt-2">
                                <label for="" class="form-label">Special Discount (%)</label>
                <input type="number" value="0" class="form-control" name="special_discount" id="special_discount" value="" >
              
                    </div>
                    
                    
                      <div class="col-md-3 mt-2">
                                <label for="" class="form-label">Vat (%)</label>
                <input type="number" class="form-control" name="vat" id="vat" value="{{$allVat}}" >
              
                    </div>
                    
                     <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Net Amount</label>
                <input type="text" readonly value="{{$finalPhpVal }}" class="form-control" name="net_amount" id="net_amount" / >
              
                    </div>
                    
                     <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Round Off</label>
                <input type="number" value="0" class="form-control" name="round_off" id="round_off" / >
              
                    </div>
                    
                     <div class="col-md-4 mt-2">
                                <label for="" class="form-label">Grand Total</label>
                <input type="text" readonly value="{{$finalPhpVal }}" class="form-control" name="grand_total" id="grand_total" / >
              
                    </div>
                    
                      <div class="col-md-6 mt-2">
                                <label for="" class="form-label">Advance Amount</label>
                <input type="number" value="0" class="form-control" name="advance_amount" id="advance_amount" / >
            
                    </div>
                    
                       <div class="col-md-6 mt-2">
                                <label for="" class="form-label">Due Amount</label>
                <input type="number" value="0" class="form-control" name="due_amount" id="due_amount" readonly / >
              
                    </div>
                    
                    
                </div>

            

         

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
            @elseif($dueStatus == 1 || $dueStatus == 2)
            
                             <div class="row">
                     <div class="col-md-4">
            
             <form action="{{ route('paymentMoney') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                @csrf
                
                 <div class="row">
                     <div class="col-md-12">
                             <label for="" class="form-label">Payment type</label>
                <select class="form-control" name="payment_type" id="payment_type" required>
                     <option value="">--- Select One ---</option>
                     <option value="Mobile Banking">Mobile Banking</option>
                    <option value="cash">cash</option>
                    <option value="check">check</option>
                    <option value="card">card</option>
                </select>
                    </div>
                    
                     <div class="col-md-12 mt-2">
                                <label for="" class="form-label">Grand Total</label>
                <input type="text" readonly value="{{$grandTotal }}" class="form-control" name="grand_total" id="grand_total" / >
                <input type="hidden" readonly value="dstep" class="form-control" name="pstep" / >
                   <input type="hidden" class="form-control" name="id" id="" value="{{ $patientHistory->id }}" >
                    </div>
                    
                      <div class="col-md-12 mt-2">
                                <label for="" class="form-label">Due Amount</label>
                <input type="number"  class="form-control" name="due_amount" value="{{$dueAmount}}" id="due_amount" readonly / >
              
                    </div>
                    
                     <div class="col-md-12 mt-2">
                                <label for="" class="form-label">Pay Amount</label>
                <input type="number" value="0" class="form-control" name="advance_amount"  / >
            
                    </div>
                    
                    </div>
                 <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
            
            </div>
            
             <div class="col-md-8">
                 
                 
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
                                    <th scope="col">Payable Amount</th>
                                    <th scope="col">Main Discount(%)</th>
                                    <th scope="col">Special Discount(%)</th>
                                    <th scope="col">Vat(%)</th>
                                    <th scope="col">Net Amount</th>
                                    <th scope="col">Round Off</th>
                                    <th scope="col">Grand Total</th>
                                    <th scope="col">Advance Pay\Total Pay</th>
                                    <th scope="col">Due</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($getAllPaymentHistory as $key=>$allGetAllPaymentHistory)
                                    <tr>
                                        <th>{{ $key+1 }}</th>
<th>{{ $allGetAllPaymentHistory->payment_type }}</th>
<th>{{ $allGetAllPaymentHistory->payment_amount }}</th>
<th>{{ $allGetAllPaymentHistory->all_discount }}</th>
<th>{{ $allGetAllPaymentHistory->special_discount }}</th>
<th>{{ $allGetAllPaymentHistory->vat }}</th>
<th>{{ $allGetAllPaymentHistory->net_amount }}</th>
<th>{{ $allGetAllPaymentHistory->round_off }}</th>
<th>{{ $allGetAllPaymentHistory->grand_total }}</th>
<th>{{ $allGetAllPaymentHistory->advance_amount	 }}</th>
<th>{{ $allGetAllPaymentHistory->due_amount }}</th>
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
              @elseif($dueStatus == 3)
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
                                    <th scope="col">Payable Amount</th>
                                    <th scope="col">Main Discount(%)</th>
                                    <th scope="col">Special Discount(%)</th>
                                    <th scope="col">Vat(%)</th>
                                    <th scope="col">Net Amount</th>
                                    <th scope="col">Round Off</th>
                                    <th scope="col">Grand Total</th>
                                    <th scope="col">Advance Pay\Total Pay</th>
                                    <th scope="col">Due</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($getAllPaymentHistory as $key=>$allGetAllPaymentHistory)
                                    <tr>
                                        <th>{{ $key+1 }}</th>
<th>{{ $allGetAllPaymentHistory->payment_type }}</th>
<th>{{ $allGetAllPaymentHistory->payment_amount }}</th>
<th>{{ $allGetAllPaymentHistory->all_discount }}</th>
<th>{{ $allGetAllPaymentHistory->special_discount }}</th>
<th>{{ $allGetAllPaymentHistory->vat }}</th>
<th>{{ $allGetAllPaymentHistory->net_amount }}</th>
<th>{{ $allGetAllPaymentHistory->round_off }}</th>
<th>{{ $allGetAllPaymentHistory->grand_total }}</th>
<th>{{ $allGetAllPaymentHistory->advance_amount	 }}</th>
<th>{{ $allGetAllPaymentHistory->due_amount }}</th>
<th>{{ $allGetAllPaymentHistory->created_at->format('d F Y') }}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            
            @endif
            
            
        </div>

      </div>
    </div>
  </div>
                            <a href ="{{ route('moveToReversed',$patientHistory->id) }}" class="btn btn-info">Moved To Reversed</a>
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

           @if(!$paymentP)
         Unpaid
                @else
                
                
               @if( $paymentP->due_amount == 0)
               
               Paid
               
               
               @else
               
           UnPaid
           
           @endif
           
                @endif

                                        </span>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                        <h5 class="fs-14 mb-0">৳ <span id="total-amount">{{$totalFacialAmount + $totalTheAmountsingle + $totalTherapyAmount1 + $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount }}</span></h5>
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

<td>{{ $allSingleFacePackageList->quantity }}</td>

<td>{{ $allSingleFacePackageList->quantity*$getFacePack }}</td>
</tr>
          @endforeach

                                            <!-- package -->
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
    <td>Therapy</td>

    @if(($key+1) == $countpatientTherapyList1)

    <td>৳ {{ $getPatientTheraPrice1 }}</td>

    @else
<td></td>
    @endif

    <td>{{ $allPatientTherapyList->amount }}</td>
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
    <td>Therapy</td>
    <td>৳ {{ $getTherapyPrices }}</td>
    <td>{{ $allPatientTherapyList->amount }}</td>
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
                               
                                    <input type="hidden" class="form control" name="main_id" value="{{$patientHistory->id}}" readonly/>
                                    
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                        <tbody>
                                        <tr>
                                            <td colspan="4">Total</td>
                                            <td class="text-end">৳ {{$mainTotal }}</td>
                                        </tr>
  <tr>
            <td colspan="4">Discount(%)</td>
            <td>
                
                @if(!$paymentP)
                
        
                
                @else
                  {{$paymentP->all_discount}}
               @endif
                
                </td>
        </tr>
        
        
          <tr>
            <td colspan="4">Special Discount(%)</td>
            <td>
                
                @if(!$paymentP)
                
        
                
                @else
                  {{$paymentP->special_discount}}
               @endif
                
                </td>
        </tr>
      
                 <tr>
            <td colspan="4">Vat(%)</td>
            <td>
                  @if(!$paymentP)
                
         
                
                @else
               {{$paymentP->vat}}
               @endif
               
                
                </td>
        </tr> 
        
        <tr>
            <td colspan="4">Net Amount(Taka)</td>
            <td>
                @if(!$paymentP)
         
                @else
           {{$paymentP->net_amount}}
                @endif
                
                </td>
        </tr>
        
        
         <tr>
            <td colspan="4">Round Off (Taka)</td>
            <td>
                @if(!$paymentP)
         
                @else
           {{$paymentP->round_off}}
                @endif
                
                </td>
        </tr>
        
        
        
        <tr>
            <td colspan="4">Grand Total (Taka)</td>
            <td>
                @if(!$paymentP)
         
                @else
           {{$paymentP->grand_total}}
                @endif
                
                </td>
        </tr>
                                    
        <tr>
            <td colspan="4">Advance/Total Pay(Taka)</td>
            <td>{{$paymentPa}}</td>
        </tr>
       <tr>
            <td colspan="4">Due Amount (Taka)</td>
            <td>
                @if(!$paymentP)
         
                @else
           {{$paymentP->due_amount}}
                @endif
                
                </td>
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
                                    <th scope="col">Payable Amount</th>
                                    <th scope="col">Main Discount(%)</th>
                                    <th scope="col">Special Discount(%)</th>
                                    <th scope="col">Vat(%)</th>
                                    <th scope="col">Net Amount</th>
                                    <th scope="col">Round Off</th>
                                    <th scope="col">Grand Total</th>
                                    <th scope="col">Advance Pay\Total Pay</th>
                                    <th scope="col">Due</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($getAllPaymentHistory as $key=>$allGetAllPaymentHistory)
                                    <tr>
                                        <th>{{ $key+1 }}</th>
<th>{{ $allGetAllPaymentHistory->payment_type }}</th>
<th>{{ $allGetAllPaymentHistory->payment_amount }}</th>
<th>{{ $allGetAllPaymentHistory->all_discount }}</th>
<th>{{ $allGetAllPaymentHistory->special_discount }}</th>
<th>{{ $allGetAllPaymentHistory->vat }}</th>
<th>{{ $allGetAllPaymentHistory->net_amount }}</th>
<th>{{ $allGetAllPaymentHistory->round_off }}</th>
<th>{{ $allGetAllPaymentHistory->grand_total }}</th>
<th>{{ $allGetAllPaymentHistory->advance_amount	 }}</th>
<th>{{ $allGetAllPaymentHistory->due_amount }}</th>
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

<script>
    $('#main_discount').on('change', function() {
  var mainValue = this.value;
  
  
     if(mainValue == 'Yes'){
         
        
     $("#all_discount").removeAttr('disabled'); 
         
     }else{
         
         $("#all_discount").attr('disabled','disabled'); 
         
     }
  
  
});

//main discount

 $('#all_discount').on('change', function() {
     
     var mainDiscount =this.value;
     var mainMainTotal = $('#amount').val();
     var mainVat = $('#vat').val();
     var mainSpecialDiscount = $('#special_discount').val();
     
     
     if(mainSpecialDiscount == 0){
     
     
     var perCal =(parseInt(mainMainTotal)*parseInt(mainDiscount)) / 100;
     var perCalVat =(parseInt(mainMainTotal)*parseInt(mainVat)) / 100;
     
     var finalCal = parseInt(mainMainTotal) +parseInt(perCalVat) - parseInt(perCal)
     }else{
         
         
          var perCal =(parseInt(mainMainTotal)*parseInt(mainDiscount)) / 100;
     var perCalVat =(parseInt(mainMainTotal)*parseInt(mainVat)) / 100;
     
     
      var perCalSpecial =(parseInt(mainMainTotal)*parseInt(mainSpecialDiscount)) / 100;
     
     var finalCal = (parseInt(mainMainTotal) +parseInt(perCalVat)) - (parseInt(perCal)+parseInt(perCalSpecial))
         
         
     }
     
     $('#net_amount').val(finalCal);
     $('#grand_total').val(finalCal);
     
      var roundOff =$('#round_off').val(); 
     var netAmount =$('#net_amount').val();
     
     
     
     
     
     var finalCal12 = parseInt(netAmount) - parseInt(roundOff);
     
      $('#grand_total').val(finalCal12);
      
         var advanceAmount =$('#advance_amount').val(); 
     var grandTotal =$('#grand_total').val();
     
     
     
     
     
     var finalCal32 = parseInt(grandTotal) - parseInt(advanceAmount);
     
      $('#due_amount').val(finalCal32);
     
});
//end main discount

//special discount

 $('#special_discount').on('keyup', function() {
     
     var mainDisNew =$('#main_discount').val(); 
     var mainDiscount =$('#all_discount').val();
     var mainMainTotal = $('#amount').val();
     var mainVat = $('#vat').val();
     var mainSpecialDiscount = $('#special_discount').val();
     
     
     if(mainDisNew == 'No'){
     
     
   
     var perCalVat =(parseInt(mainMainTotal)*parseInt(mainVat)) / 100;
     
     
      var perCalSpecial =(parseInt(mainMainTotal)*parseInt(mainSpecialDiscount)) / 100;
     
     var finalCal = (parseInt(mainMainTotal) +parseInt(perCalVat)) - (parseInt(perCalSpecial))
     }else{
         
         
          var perCal =(parseInt(mainMainTotal)*parseInt(mainDiscount)) / 100;
     var perCalVat =(parseInt(mainMainTotal)*parseInt(mainVat)) / 100;
     
     
      var perCalSpecial =(parseInt(mainMainTotal)*parseInt(mainSpecialDiscount)) / 100;
     
     var finalCal = (parseInt(mainMainTotal) +parseInt(perCalVat)) - (parseInt(perCal)+parseInt(perCalSpecial))
         
         
     }
     
       $('#net_amount').val(finalCal);
     $('#grand_total').val(finalCal);
     
     
      var roundOff =$('#round_off').val(); 
     var netAmount =$('#net_amount').val();
     
     
     
     
     
     var finalCal12 = parseInt(netAmount) - parseInt(roundOff);
     
      $('#grand_total').val(finalCal12);
      
      
      
       var advanceAmount =$('#advance_amount').val(); 
     var grandTotal =$('#grand_total').val();
     
     
     
     
     
     var finalCal32 = parseInt(grandTotal) - parseInt(advanceAmount);
     
      $('#due_amount').val(finalCal32);
     
});
//end special discount


//start roud off 

$('#round_off').on('keyup', function() {
    
     var roundOff =$('#round_off').val(); 
     var netAmount =$('#net_amount').val();
     
     
     
     
     
     var finalCal = parseInt(netAmount) - parseInt(roundOff);
     
      $('#grand_total').val(finalCal);

});
//end round off

//advance cal


$('#advance_amount').on('keyup', function() {
    
     var advanceAmount =$('#advance_amount').val(); 
     var grandTotal =$('#grand_total').val();
     
     
     
     
     
     var finalCal = parseInt(grandTotal) - parseInt(advanceAmount);
     
      $('#due_amount').val(finalCal);

});



//end advance cal
</script>

@endsection
