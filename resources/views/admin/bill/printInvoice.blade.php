
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8"/>
    <title>HNHAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <style>
        .billing_pdf {
            padding: 10px;
        }

        [class*="col-"] {
            float: left;

        }

        [class*="col-"] {
            width: 100%;
        }

        .col-1 {
            width: 50%;
        }



        .logo_image {
            text-align: center;
        }

        .logo_image img {
            height: 150px;
            width: 100px;
        }

        table {
            width: 100%;
        }

        .sl_dt {
            font-size: 18px;
        }

        hr {
            border: 2px dotted #959595;
        }

        .item_table td, th {
            border: 1px solid;
            text-align: left;
            padding: 10px;
        }

        .item_table {
            border-collapse: collapse;
        }

    </style>

</head>

<body>
<div class="billing_pdf">
    <div class="uppder_section">
        <div class="col-1">
            <div class="upper_text">
                <h3>Health & Healing <br> Ayurveda Research Center</h3>
                <p>Address: House No: 88, Road: 23 <br> Block A, Banani, Dhaka, Bangladesh </p>
                <p>hnharbd@gmail.com</p>
            </div>
        </div>
        <div class="col-1">
            <div class="logo_image">
                <img src="{{ asset('/') }}{{ $logo }}" alt="">
            </div>
        </div>
    </div>


    <table class="sl_dt">
        <tr>
            <td>Invoice No <br> <b>#<?php echo mt_rand(1000000, 9999999);?></b></td>
            <td>Date <br> <b>{{ $patientHistory->created_at->format('d F Y') }}</b></td>
            <td>Payment Status <br> <b>Paid</b></td>
            <td>Total Amount <br> <b>{{ $mainTotal }} Taka</b></td>
        </tr>
    </table>

    <hr>

    <table class="sl_dt">
        <tr>
            <td style="width: 10%">Name:</td>
            <td>@if(empty($getNameFromWalkByPatient))
                {{ $getNameFromPatient }}
                @else
                {{ $getNameFromWalkByPatient }}
                @endif</td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>:@if(empty($getAddressFromWalkByPatient))
                {{ $getAddressFromPatient }}
                @else
                {{ $getAddressFromWalkByPatient }}
                @endif</td>
        </tr>
    </table>

    <hr>

    <table class="item_table">
        <tr>
            <th scope="col">Product Details</th>

            <th scope="col">Rate</th>
            <th scope="col">Quantity</th>
            <th scope="col" class="text-end">Amount</th>
        </tr>
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
           <span class="fw-medium"><span style="color: #3f3f3f;">Face Pack</span> :{{ $getFacePackName}}</span>

       </td>

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
                                                   <span class="fw-medium"><span style="color: #3f3f3f;">Therapy</span> :{{ $getTherapyPriceName1 }}({{ $getPackage1 }})</span>

                                               </td>


                                               @if(($key+1) == $countpatientTherapyList1)

                                               <td>BDT {{ $getPatientTheraPrice1 }}</td>

                                               @else
                                           <td></td>
                                               @endif

                                               <td>{{ $allPatientTherapyList->amount }}</td>
                                               @if(($key+1) == $countpatientTherapyList1)

                                               <td class="text-end">BDT {{ $allPatientTherapyList->amount*$getPatientTheraPrice1 }}</td>

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
                                                   <span class="fw-medium"><span style="color: #3f3f3f;">Therapy</span> :{{ $getTherapyPriceNames}}</span>

                                               </td>
                                               {{-- <td>Therapy</td> --}}
                                               <td>BDT {{ $getTherapyPrices }}</td>
                                               <td>{{ $allPatientTherapyList->amount }}</td>
                                               <td class="text-end">BDT {{ $allPatientTherapyList->amount*$getTherapyPrices }}</td>
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
            <span class="fw-medium"><span style="color: #3f3f3f;">Therapy</span> :{{ $getTherapyPriceName }}({{ $getPackage }})</span>

        </td>

        @if(($key+1) == $countpatientTherapyList)

        <td>BDT{{ $getPatientTheraPrice }}</td>

        @else
<td></td>
        @endif

        <td>{{ $allPatientTherapyList->amount }}</td>
        @if(($key+1) == $countpatientTherapyList)

        <td class="text-end">BDT{{ $allPatientTherapyList->amount*$getPatientTheraPrice }}</td>

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
        <span class="fw-medium"><span style="color: #3f3f3f;">Therapy</span> :{{ $getTherapyPriceName}}</span>

    </td>

    <td>BDT{{ $getTherapyPrice }}</td>
    <td>{{ $allPatientTherapyList->amount }}</td>
    <td class="text-end">BDT{{ $allPatientTherapyList->amount*$getTherapyPrice }}</td>
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
            <span class="fw-medium"><span style="color: #3f3f3f;">Medicine</span> :{{ $allPatientHerbList->name }}({{ $getPackage }})</span>

        </td>


           @if(($key+1) == $countpatientHerb)

        <td>BDT{{ $getPatientHerb }}</td>

        @else
<td></td>
        @endif


        <td>{{ $allPatientHerbList->how_many_dose }}</td>
        @if(($key+1) == $countpatientHerb)
        <td class="text-end">BDT{{ $getPatientHerb }}</td>


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
            <span class="fw-medium"><span style="color: #3f3f3f;">Health Suppliment</span> :{{ $allPatientMedicalSupplement->name }}</span>

        </td>

        <td>BDT{{ $getPatientMedicalSupplement }}</td>
        <td>{{ $allPatientMedicalSupplement->quantity }}</td>
        <td class="text-end">BDT{{ $getPatientMedicalSupplement*$allPatientMedicalSupplement->quantity  }}</td>
    </tr>
    @endforeach

    <?php $tt = 0 ?>
         @foreach($getAllPaymentHistory as $key=>$allGetAllPaymentHistory)
                                 
<?php  $tt = $tt + $allGetAllPaymentHistory->payment_amount ?>

                                    @endforeach
         <tr>
                                            <td colspan="4">Total</td>
                                            <td class="text-end">{{$mainTotal }}</td>
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
    </table>

    <table style="margin-top: 100px">
        <tr>
            <td style="text-align:left">Payment Status: Cash</td>
        </tr>
        <tr>
            <td style="text-align: right">Signature</td>
        </tr>
    </table>

    <table>
        <tr>
            <td></td>
        </tr>
    </table>



</div>
</body>

</html>


