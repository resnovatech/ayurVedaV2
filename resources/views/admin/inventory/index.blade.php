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
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-add-line align-bottom me-1"></i> Add New Ingredient</button>

                                    </div>
                                </div>

                            </div>

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

    <li class="nav-item waves-effect waves-light">
        <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-2" role="tab">
            Other Ingredient
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


        $quantityThree =   DB::table('inventory_damages')
        ->where('status','therapy')
        ->where('name', $allTherapyIngredients->name)->sum('quantity');



        $quantityTwo =   DB::table('patient_therapy_details')
        ->where('ingredient_name', $allTherapyIngredients->id)->sum('quantity');
?>

                    {{ $allTherapyIngredients->quantity - ($quantityOne + $quantityTwo + $quantityThree ) }}


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


        $quantityThree =   DB::table('inventory_damages')
        ->where('status','Medicine')
        ->where('name', $allmedicineEquipment->name)->sum('quantity');


?>
                    {{ $allmedicineEquipment->quantity  - ($quantityOne + $quantityThree)  }}


                </td>

            </tr>
            @endforeach
            </tbody>
        </table>


    </div>

    <div class="tab-pane" id="pill-justified-profile-2" role="tabpanel">
        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
            <thead class="table-light">
            <tr>
                <th class="sort" data-sort="customer_name">Sl</th>
                <th class="sort" data-sort="customer_name"> Name</th>
                <th class="sort" data-sort="customer_name"> Quantity</th>
                <th class="sort" data-sort="customer_name"> Available Quantity</th>
                <th class="sort" data-sort="customer_name"> Unit</th>

                <th class="sort" data-sort="action">Action</th>
            </tr>
            </thead>
            <tbody class="list form-check-all">

                @foreach($otherIngredients as $key=>$allmedicineEquipment)
            <tr>

                <td class="id">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allmedicineEquipment->name }}</td>
                <td class="customer_name">{{ $allmedicineEquipment->quantity }}</td>


                <td class="customer_name">
<?php
 $quantityThree =   DB::table('inventory_damages')
        ->where('status','other')
        ->where('name', $allmedicineEquipment->name)->sum('quantity');

//dd($quantityThree);
    ?>
{{ $allmedicineEquipment->quantity - $quantityThree  }}

                </td>

                <td class="customer_name">{{ $allmedicineEquipment->unit }}</td>
                <td>



                    @if (Auth::guard('admin')->user()->can('inventoryUpdate'))
                    <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $allmedicineEquipment->id }}"
                    class="btn btn-primary waves-light waves-effect  btn-sm" >
                    <i class="ri-pencil-fill"></i></button>

                      <!--  Large modal example -->
                      <div class="modal fade bs-example-modal-lg{{ $allmedicineEquipment->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="myLargeModalLabel">Update Medicine Equipment Name</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('inventoryList.update',$allmedicineEquipment->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <label for="" class="form-label">Name</label>
                                                {{-- <input type="text" value="{{ $allmedicineEquipment->name }}" name ="name" class="form-control" id="" placeholder="Name" required> --}}

                                                <select name ="name" class="form-control">
                                                    <option>--Select One --</option>
                                                    @foreach($inventoryNames as $AllInventory)
                    <option value="{{ $AllInventory->name }}"  {{ $allmedicineEquipment->name == $AllInventory->name ? 'selected':''}}>{{ $AllInventory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <label for="" class="form-label">Quantity</label>
                                                <input type="text" name="quantity" value="{{ $allmedicineEquipment->quantity }}"
                                                       class="form-control"/>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <label for="" class="form-label">Unit</label>
                                                <input type="text" name="unit" value="{{ $allmedicineEquipment->unit }}"
                                                class="form-control"/>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                    </form>
                                  </div>
                              </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->


@endif

{{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

            @if (Auth::guard('admin')->user()->can('inventoryDelete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allmedicineEquipment->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
<form id="delete-form-{{ $allmedicineEquipment->id }}" action="{{ route('inventoryList.destroy',$allmedicineEquipment->id) }}" method="POST" style="display: none;">
@method('DELETE')
          @csrf

      </form>
                          @endif

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
<!-- Default Modals -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Inventory Category Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inventoryList.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">

                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Inventory Category</label>
                            <select name ="category" class="form-control" id=""  required>
                                <option value="">--Please select --</option>
                                @foreach($inventoryCategorys as $allInventoryCategorys)
<option value="{{ $allInventoryCategorys->name }}">{{ $allInventoryCategorys->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Name</label>
                            {{-- <input type="text" name ="name" class="form-control" id="" placeholder="Name" required> --}}
                            <select name ="name" class="form-control">
                                <option>--Select One --</option>
                                @foreach($inventoryNames as $AllInventory)
<option value="{{ $AllInventory->name }}">{{ $AllInventory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Quantity</label>
                            <input type="text" name="quantity" value=""
                                   class="form-control"/>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Unit</label>
                            <input type="text" name="unit" value=""
                            class="form-control"/>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('script')


@endsection
