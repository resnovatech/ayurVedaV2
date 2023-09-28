@extends('admin.master.master')

@section('title')
Inventory Damage List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Inventory Damage List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Inventory Damage List</li>
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
                        <h4 class="card-title mb-0">Inventory Damage Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">


                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-add-line align-bottom me-1"></i> Add New</button>

                                    </div>
                                </div>

                            </div>

                            <!--new code -->

 <!-- Nav tabs -->
 <ul class="nav nav-pills nav-justified mb-3" role="tablist">
    {{-- <li class="nav-item waves-effect waves-light">
        <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
            Thearpy Ingredient
        </a>
    </li> --}}



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

                <th class="sort" data-sort="customer_name">Action</th>
            </tr>
            </thead>
            <tbody class="list form-check-all">

                @foreach($inventoryDamageList as $key=>$allTherapyIngredients)
            <tr>

                <td class="id">{{ $key+1 }}</td>
                <td class="customer_name">{{ $allTherapyIngredients->name }}</td>
                <td class="customer_name">{{ $allTherapyIngredients->quantity }}</td>

                <td class="customer_name">

                    @if (Auth::guard('admin')->user()->can('inventoryDamageDelete'))

                    <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allTherapyIngredients->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
                    <form id="delete-form-{{ $allTherapyIngredients->id }}" action="{{ route('inventoryDamage.destroy',$allTherapyIngredients->id) }}" method="POST" style="display: none;">
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
                <h5 class="modal-title" id="myModalLabel">Inventory Damage Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inventoryDamage.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
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
                        {{-- <div class="col-12 mb-2">
                            <label for="" class="form-label">Unit</label>
                            <input type="text" name="unit" value=""
                            class="form-control"/>
                        </div> --}}

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
