@extends('admin.master.master')

@section('title')
Inventory List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Inventory  List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Inventory  List</li>
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
                        <h4 class="card-title mb-0">Inventory Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">


                        <div id="customerList">


                            <!--new code -->

 <!-- Nav tabs -->
 <ul class="nav nav-pills nav-justified mb-3" role="tablist">
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
            Thearpy Ingredient
        </a>
    </li>
    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
            Medicine Equipment
        </a>
    </li>


</ul>
<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">

        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
            <thead class="table-light">
            <tr>
                <th class="sort" data-sort="customer_name">Sl</th>
                <th class="sort" data-sort="customer_name"> Name</th>
                <th class="sort" data-sort="customer_name"> Quantity</th>
                <th class="sort" data-sort="customer_name"> Available Quantity</th>

            </tr>
            </thead>
            <tbody class="list form-check-all">

                @foreach($therapyIngredients as $key=>$allTherapyIngredients)
            <tr>

                <td class="id">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allTherapyIngredients->name }}</td>
                <td class="customer_name">{{ $allTherapyIngredients->quantity }}</td>
                <td class="customer_name">

<?php
                  $quantityOne =   DB::table('therapy_appointment_details')
        ->where('name', $allTherapyIngredients->id)->sum('amount');

        $quantityTwo =   DB::table('patient_therapy_details')
        ->where('ingredient_name', $allTherapyIngredients->id)->sum('quantity');
?>

                    {{ $allTherapyIngredients->quantity - ($quantityOne + $quantityTwo ) }}


                </td>


            </tr>
            @endforeach
            </tbody>
        </table>


    </div>
    <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">

        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
            <thead class="table-light">
            <tr>
                <th class="sort" data-sort="customer_name">Sl</th>
                <th class="sort" data-sort="customer_name"> Name</th>
                <th class="sort" data-sort="customer_name"> Quantity</th>
                <th class="sort" data-sort="customer_name"> Available Quantity</th>


            </tr>
            </thead>
            <tbody class="list form-check-all">

                @foreach($medicineEquipments as $key=>$allmedicineEquipment)
            <tr>

                <td class="id">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allmedicineEquipment->name }}</td>
                <td class="customer_name">{{ $allmedicineEquipment->quantity }}</td>
                <td class="customer_name">


                    <?php
                  $quantityOne =   DB::table('patient_herb_details')
        ->where('ingredient_name', $allmedicineEquipment->id)->sum('quantity');
?>
                    {{ $allmedicineEquipment->quantity  - $quantityOne  }}


                </td>

            </tr>
            @endforeach
            </tbody>
        </table>


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

@endsection


@section('script')


@endsection
