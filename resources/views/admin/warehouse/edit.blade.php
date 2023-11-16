@extends('admin.master.master')

@section('title')
Edit Data in Warehouse | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Data in Warehouse</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                            <li class="breadcrumb-item active">Edit Data in Warehouse</li>
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
                        <h4 class="card-title mb-0">Warehouse Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('warehouse.update',$warehouses->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Name</label>
                                    <select  name ="name" class="form-control js-example-basic-single" id="" placeholder="Action" required>
                                        <option value="">--please select--</option>
                                        @foreach($inventoryName as $inventoryNames)
                                        <option value="{{ $inventoryNames->name }}"  {{ $inventoryNames->name == $warehouses->action ? 'selected':'' }}>{{ $inventoryNames->name }}</option>
                                        @endforeach

                                    </select>
                                </div>




                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Quantity</label>
                                    <input type="text" value="{{ $warehouses->quantity }}" name ="quantity" class="form-control" id="" placeholder="Quantity" required>
                                </div>


                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Unit</label>
                                    {{-- <input type="text" name="unit" value=""
                                    class="form-control"/> --}}


                                    <select name ="unit" class="form-control js-example-basic-single">
                                        <option value="">--Select One --</option>

        <option value="Gram" {{ 'Gram' == $warehouses->action ? 'selected':'' }}>Gram</option>
        <option value="Piece" {{ 'Piece' == $warehouses->action ? 'selected':'' }}>Piece</option>
        <option value="Ml" {{ 'Ml' == $warehouses->action ? 'selected':'' }}>Ml</option>
        <option value="Drops" {{ 'Drops' == $warehouses->action ? 'selected':'' }}>Drops</option>
        </select>



                                </div>

                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" value="{{ $warehouses->price }}" name ="price" class="form-control" id="" placeholder="Price" required>
                                </div>


                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Vendor</label>
                                    <select  name ="vendor" class="form-control js-example-basic-single" id="" placeholder="Action" required>
                                        <option value="">--please select--</option>

                                        @foreach($vendor as $vendors)
                                        <option value="{{ $vendors->name }}" {{ $vendors->name == $warehouses->vendor ? 'selected':'' }}>{{ $vendors->name }}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Expirey Date</label>
                                    <input type="text" value="{{ $warehouses->expired_date }}" name ="expired_date" class="form-control datepicker" id="" placeholder="Expirey Date" required>
                                </div>






                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->


@endsection


@section('script')

@endsection

