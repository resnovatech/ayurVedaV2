<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>
                  @if(empty($getNameFromWalkByPatient))

<p>{{ $getNameFromPatient }}</p>
                                            @else
                                            <p>{{ $getNameFromWalkByPatient }}</p>
                                            @endif
                                             @if(empty($getPhoneFromWalkByPatient))
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromPatient }}</p>
                                            @else
                                            <p class="text-muted mb-1" id="address-details">{{ $getPhoneFromWalkByPatient }}</p>
                                            @endif
<h2>Therapy List</h2>

        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                        <tr class="table-active">
<th>Sl No</th>
                                            <th scope="col">Therapy</th>

                                            <th scope="col">Cost</th>
                                            <th scope="col">Setting</th>
                                            <th scope="col" class="text-end">Amount</th>
                                             <th scope="col" class="text-end">Client signature</th>
                                        </tr>
                                        </thead>
                                        <tbody id="products-list">

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

                                                      <td class="text-end">BDT {{ $totalTherapyAmount1 = $allPatientTherapyList->amount*$getPatientTheraPrice1 }}</td>

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
                                                      <td class="text-end">BDT {{$totalTheAmountsingle = $totalTheAmountsingle +($allPatientTherapyList->amount*$getTherapyPrices) }}</td>
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

                                            <td>BDT {{ $getPatientTheraPrice }}</td>

                                            @else
<td></td>
                                            @endif

                                            <td>{{ $allPatientTherapyList->amount }}</td>
                                            @if(($key+1) == $countpatientTherapyList)

                                            <td class="text-end">BDT {{ $allPatientTherapyList->amount*$getPatientTheraPrice }}</td>

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
                                        <td>BDT {{ $getTherapyPrice }}</td>
                                        <td>{{ $allPatientTherapyList->amount }}</td>
                                        <td class="text-end">BDT {{ $allPatientTherapyList->amount*$getTherapyPrice }}</td>
                                    </tr>
                                    @endforeach




                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <div style="margin-top:20px;">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td style="width:80%; text-align:right; padding-right:20px;">Total</td>
                                            <td style="width:20%; text-align:right">BDT {{$totalTherapyAmount1 + $totalTheAmountsingle + $totalTherapyAmountsingle + $totalTherapyAmount }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:80%; text-align:right; padding-right:20px;">Discount</td>
                                            <td style="width:20%; text-align:right">BDT </td>
                                        </tr>
                                        <tr>
                                            <td style="width:80%; text-align:right; padding-right:20px;">Cumulative Amount</td>
                                            <td style="width:20%; text-align:right">BDT </td>
                                        </tr>
                                        <tr>
                                            <td style="width:80%; text-align:right; padding-right:20px;">Grand Total</td>
                                            <td style="width:20%; text-align:right">BDT </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    </div>


                                    <!--end table-->

</body>
</html>
