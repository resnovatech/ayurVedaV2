@extends('admin.master.master')

@section('title')
Discount List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Discount List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Discount List</li>
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
                        <h4 class="card-title mb-0">Discount  Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-add-line align-bottom me-1"></i> Add New Discount </button>

                                    </div>
                                </div>

                            </div>


                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Sl</th>
                                        <th class="sort" data-sort="customer_name"> Name</th>

                                        <th class="sort" data-sort="customer_name"> Amount(%)</th>
                                          <th class="sort" data-sort="customer_name">Client Type</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                        @foreach($medicineEquipments as $key=>$allmedicineEquipment)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->name }}</td>
                                        <td class="customer_name">{{ $allmedicineEquipment->amount }}</td>
                                         <td class="customer_name">{{ $allmedicineEquipment->client_type }}</td>
                                        <td>



                                            @if (Auth::guard('admin')->user()->can('inventoryCategoryUpdate'))
                                            <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $allmedicineEquipment->id }}"
                                            class="btn btn-primary waves-light waves-effect  btn-sm" >
                                            <i class="ri-pencil-fill"></i></button>

                                              <!--  Large modal example -->
                                              <div class="modal fade bs-example-modal-lg{{ $allmedicineEquipment->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="myLargeModalLabel">Update Discount Name</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="{{ route('discount.update',$allmedicineEquipment->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Name</label>
                                                                        <input type="text" value="{{ $allmedicineEquipment->name }}" name ="name" class="form-control" id="" placeholder="Name" required>
                                                                    </div>


                                                                    <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Amount(%)</label>
                                                                        <input type="text" value="{{ $allmedicineEquipment->amount }}" name ="amount" class="form-control" id="" placeholder="Amount" required>
                                                                    </div>
                                                                    
                                                                    
                                                                     <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Client type</label>
                                                                        <select name ="client_type" class="form-control" id="" placeholder="Amount" required>
                                                                            <option value="">--Select One--</option>
                                                                              <option value="All" {{$allmedicineEquipment->client_type == 'All' ? 'selected':''}}>All</option>
                                                                                <option value="Walking Patient" {{$allmedicineEquipment->client_type == 'Walking Patient' ? 'selected':''}}>Walking Patient</option>
                                                                                    <option value="Patient" {{$allmedicineEquipment->client_type == 'Patient' ? 'selected':''}}>Patient</option>
                                                                                     <option value="Patient Admit" {{$allmedicineEquipment->client_type == 'Patient Admit' ? 'selected':''}}>Patient Admit</option>
                                                                            </select>
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

                                    @if (Auth::guard('admin')->user()->can('inventoryCategoryDelete'))

  <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allmedicineEquipment->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
  <form id="delete-form-{{ $allmedicineEquipment->id }}" action="{{ route('discount.destroy',$allmedicineEquipment->id) }}" method="POST" style="display: none;">
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

<!-- Default Modals -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Vat Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('discount.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name ="name" class="form-control" id="" placeholder="Name" required>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Amount(%)</label>
                            <input type="text"  name ="amount" class="form-control" id="" placeholder="Amount" required>
                        </div>

  <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Client type</label>
                                                                        <select name ="client_type" class="form-control" id="" placeholder="Amount" required>
                                                                            <option value="">--Select One--</option>
                                                                              <option value="All">All</option>
                                                                                <option value="Walking Patient">Walking Patient</option>
                                                                                    <option value="Patient">Patient</option>
                                                                                     <option value="Patient Admit">Patient Admit</option>
                                                                            </select>
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
