@extends('admin.master.master')

@section('title')
Warehouse | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Warehouse</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Warehouse</li>
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
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('warehouse.create') }}" type="button" class="btn btn-primary add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add New Data </a>

                                    </div>
                                </div>

                            </div>


                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Sl</th>
                                        <th class="sort" data-sort="customer_name"> Name</th>
                                        <th class="sort" data-sort="customer_name">Quantity</th>

                                        <th class="sort" data-sort="customer_name">Unit</th>
                                        <th class="sort" data-sort="customer_name">Price</th>
                                        <th class="sort" data-sort="customer_name">Vendor</th>
                                        <th class="sort" data-sort="customer_name">Expired Date</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                        @foreach($warehouses as $key=>$allmedicineEquipment)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->name }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->quantity }}</td>

                                        <td class="customer_name">{{ $allmedicineEquipment->unit }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->price }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->vendor }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->expired_date }}</td>
                                        <td>



                                            @if (Auth::guard('admin')->user()->can('warehouseUpdate'))
                                            <a type="button" href="{{ route('warehouse.edit',$allmedicineEquipment->id) }}"
                                            class="btn btn-primary waves-light waves-effect  btn-sm" >
                                            <i class="ri-pencil-fill"></i></a>



  @endif

  {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                    @if (Auth::guard('admin')->user()->can('warehouseDelete'))

  <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allmedicineEquipment->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
  <form id="delete-form-{{ $allmedicineEquipment->id }}" action="{{ route('warehouse.destroy',$allmedicineEquipment->id) }}" method="POST" style="display: none;">
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

