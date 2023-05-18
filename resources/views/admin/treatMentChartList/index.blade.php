@extends('admin.master.master')

@section('title')
TreatMent Chart List
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">TreatMent Chart Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">TreatMent Chart Information</li>
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
                        <h4 class="card-title mb-0">TreatMent Chart Info</h4>
                    </div><!-- end card header -->

                    <div class="card-body">


                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('treatMentChart.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New TreatMent Chart</button>

                                </div>
                            </div>

                        </div>

                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead >
                                    <tr>
                                        <th >Sl</th>
                                        <th>Therapy Name</th>
                                        <th>Therapy Ingridents</th>
                                        <th >Days</th>
                                        <th >Time Of The Day</th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                        @foreach($treatMentChartList as $key=>$allTreatMentChartList)
                                        <tr>
                                        <td >{{ $key+1 }}</td>
                                        <td>{{ $allTreatMentChartList->therapy_id }}</td>
                                        <td>

                                            <?php

                                            $ingredientList = DB::table('therapy_lists')->where('name',$allTreatMentChartList->therapy_id )->value('id');
                                            $mainId = DB::table('therapy_details')->where('therapy_list_id',$ingredientList)->get();


                                            $convert_name_title = $mainId->implode("therapy_ingredient_id", " ");
                                            $separated_data_title = explode(" ", $convert_name_title);

                                            $listOfIngredients = DB::table('therapy_ingredients')->whereIn('id',$separated_data_title)->get();


                                            ?>

                                            @foreach($listOfIngredients as $allListOfIngredients)

                                            {{ $allListOfIngredients->name }}
                                           @endforeach

                                        </td>
                                        <td>{{ $allTreatMentChartList->day }}</td>
                                        <td>{{ $allTreatMentChartList->time_of_the_day }}</td>

                                       </tr>

                                        @endforeach


                                    </tbody>
                                </table>





                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection


@section('script')
@endsection
