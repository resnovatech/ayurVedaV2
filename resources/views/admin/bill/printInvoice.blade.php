<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
   <style>
        body {
            color: #333639;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* .body_size
        {
            width: 75mm;
            height: 100mm;
            padding: 3px;
        } */



        table {
            width: 100%;
        }

        .first_table tr td {
            width: 50%;
        }

        .first_table tr td:nth-child(1) img {
            height:70px;
            width:70px;
        }

        .first_table tr td:nth-child(2)
        {
            text-align: right;
        }

        .first_table tr td:nth-child(2) img {
            height:40px;
            width:40px;
        }

        .first_table tr td:nth-child(2) p {
            font-size:8px;
            padding:0;
            margin:0;
        }
        .first_table tr td:nth-child(2) h4 {
            font-size:12px;
            padding:0;
            margin:0;
        }

        hr{
            margin-bottom: 0;
            margin-top:0;
        }

        .second_table tr td {
            font-size: 13px;
            vertical-align: top;
        }

        .second_table tr td:nth-child(1) {
            width: 40%;
        }
        .second_table tr td p{
            margin: 0;
            padding: 2px;
        }

        .second_table tr td:nth-child(2)
        {
            font-weight: bold;
            width: 60%;
        }

        .third_table {
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 10px;
        }
        .third_table th {
            padding: 2px;
            text-align: left;
            background-color: #F8F9FA;
            border: 1px solid #e9ecef;
        }

        .third_table tr th:nth-child(2)
        {
            width: 40px;
        }

        .third_table td {
            border: 1px solid #e9ecef;
            padding: 4px;
        }

        .forth_table
        {
            font-size: 12px;
            vertical-align: top;
        }
        .forth_table tr td:nth-child(1)
        {
            width: 40%;
        }
        .forth_table tr td:nth-child(2)
        {
            width: 60%;
        }

        .inner-table tr td:nth-child(1)
        {
            width: 65%;
        }
    </style>
</head>
<body>



            <table class="first_table">
        <tr>
            <td>
                <img src="{{ asset('/') }}{{ $logo }}" height="50" alt="">
            </td>
            <td>
                {{-- <img src="{{ asset('/') }}{{ $logo }}" height="50" alt=""> --}}
                <p style="font-weight: bold;">Date: {{ $patientHistory->created_at->format('d F Y') }}</p>
                <p style="font-weight: bold;">Mobile No: {{ $ins_phone }}</p>
                <h4>{{ $ins_name }}</h4>
            </td>
        </tr>
    </table>

    <hr>

    <table class="second_table">
        <tr>
            <td>Customer Name</td>
            <td>:@if(empty($getNameFromWalkByPatient))
                {{ $getNameFromPatient }}
                @else
                {{ $getNameFromWalkByPatient }}
                @endif</td>
        </tr>
        <tr>

            <td>Mobile Number</td>
            <td>:@if(empty($getPhoneFromWalkByPatient))
                {{ $getPhoneFromPatient }}
                @else
                {{ $getPhoneFromWalkByPatient }}
                @endif</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:@if(empty($getAddressFromWalkByPatient))
                {{ $getAddressFromPatient }}
                @else
                {{ $getAddressFromWalkByPatient }}
                @endif</td>
        </tr>
    </table>



<table class="third_table">

    <thead>
    <tr>
        <th scope="col">Product Details</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Rate</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col" class="text-end">Amount</th>
    </tr>
    </thead>
    <tbody>

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
                                                   <span class="fw-medium">{{ $getTherapyPriceNames}}</span>

                                               </td>
                                               <td>Therapy</td>
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
            <span class="fw-medium">{{ $getTherapyPriceName }}({{ $getPackage }})</span>

        </td>
        <td>Therapy</td>
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
        <span class="fw-medium">{{ $getTherapyPriceName}}</span>

    </td>
    <td>Therapy</td>
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
            <span class="fw-medium">{{ $allPatientHerbList->name }}({{ $getPackage }})</span>

        </td>
           <td>Medicine</td>

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
            <span class="fw-medium">{{ $allPatientMedicalSupplement->name }}</span>

        </td>
           <td>Health Suppliment</td>
        <td>BDT{{ $getPatientMedicalSupplement }}</td>
        <td>{{ $allPatientMedicalSupplement->quantity }}</td>
        <td class="text-end">BDT{{ $getPatientMedicalSupplement*$allPatientMedicalSupplement->quantity  }}</td>
    </tr>
    @endforeach




    </tbody>
</table>

<table class="forth_table">


    <tr>
    <td>
                {{-- <h4>COD Charge: <br> <span style="font-size:8px;">Powered By ResNova Tech Limited</span>
                </h4> --}}
            </td>
    <td>
      <table class="inner-table">

        <tr style="font-weight:bold">
          <td>Total</td>
          <td>BDT{{ $mainTotal }}</td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
