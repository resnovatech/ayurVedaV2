@extends('admin.master.master')

@section('title')
Powder List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Powder List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Powder List</li>
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
                        <h4 class="card-title mb-0">Powder Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-add-line align-bottom me-1"></i> Add New Powder Info </button>

                                    </div>
                                </div>

                            </div>


                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Sl</th>
                                        <th class="sort" data-sort="customer_name"> Name</th>
                                        <th class="sort" data-sort="customer_name"> Amount</th>
                                        <th class="sort" data-sort="customer_name"> Medicine Equipment</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                        @foreach($powders as $key=>$allpowdersLists)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allpowdersLists->name }}</td>

                                        <td class="customer_name">{{ $allpowdersLists->amount }}</td>
                                        <td>

                                            {{ $allpowdersLists->medicine_equipment_id }}
                                        </td>


                                        <td>



                                            @if (Auth::guard('admin')->user()->can('powderUpdate'))
                                            <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $allpowdersLists->id }}"
                                            class="btn btn-primary waves-light waves-effect  btn-sm" >
                                            <i class="ri-pencil-fill"></i></button>

                                              <!--  Large modal example -->
                                              <div class="modal fade bs-example-modal-lg{{ $allpowdersLists->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="myLargeModalLabel">Update Therapy  Info</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="{{ route('powderList.update',$allpowdersLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Name</label>
                                                                        <input type="text" value="{{ $allpowdersLists->name }}" name ="name" class="form-control" id="" placeholder="Name" required>
                                                                    </div>


                                                                    <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Amount</label>
                                                                        <input type="text" value="{{ $allpowdersLists->amount }}" name ="amount" class="form-control" id="" placeholder="Amount" required>
                                                                    </div>


                                                                    <?php
                                                                    $convert_new_ass_cat  = explode(",",$allpowdersLists->medicine_equipment_id);

                                                                   // dd( $convert_new_ass_cat);

                                                                                       ?>

                                                                    <div class="col-12">
                                                                        <table class="table table-bordered dynamicAddRemove" id="">
                                                                            <tr>
                                                                                <th>Medical Equipment</th>
                                                                            </tr>
                                                                            @foreach($convert_new_ass_cat as $j=>$allTherapyIngredient)
                                                                            @if($j == 0 )
                                                                            <tr id="mDelete{{ $j+50000 }}">
                                                                                <td>
                                                                                    <select class="form-select mb-3" name="medicine_equipment_id[]" aria-label="Default select example">
                                                                                        @foreach($medicineEquipments as $allmedicineEquipments)

                                                                                        <option value="{{ $allmedicineEquipments->name }}" {{ $allTherapyIngredient ==  $allmedicineEquipments->name ? 'selected':'' }}>{{ $allmedicineEquipments->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </td>

                                                                                <td>

                                                                                    <button type="button" name="add"  id=""
                                                                                            class="btn btn-outline-primary dynamic-ar">Add New Equipment
                                                                                    </button>




                                                                                </td>
                                                                            </tr>
                                                                            @else
                                                                            <tr id="mDelete{{ $j+50000 }}">
                                                                                <td>
                                                                                    <select class="form-select mb-3" name="medicine_equipment_id[]" aria-label="Default select example">
                                                                                        @foreach($medicineEquipments as $allmedicineEquipments)

                                                                                        <option value="{{ $allmedicineEquipments->name }}" {{ $allTherapyIngredient ==  $allmedicineEquipments->name ? 'selected':'' }}>{{ $allmedicineEquipments->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </td>

                                                                                <td>



                                                                                    <button type="button" id="remove-input-fieldd{{ $j+50000 }}" class="btn btn-outline-danger ">Delete</button>


                                                                                </td>
                                                                            </tr>
                                                                            @endif
                                                                            @endforeach
                                                                        </table>
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

                                    @if (Auth::guard('admin')->user()->can('powderDelete'))

  <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allpowdersLists->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
  <form id="delete-form-{{ $allpowdersLists->id }}" action="{{ route('powderList.destroy',$allpowdersLists->id) }}" method="POST" style="display: none;">
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
                <h5 class="modal-title" id="myModalLabel">Powder Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('powderList.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name ="name" class="form-control" id="" placeholder="Name" required>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Amount</label>
                            <input type="text"  name ="amount" class="form-control" id="" placeholder="Amount" required>
                        </div>

                        <div class="col-12">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Medical Equipment</th>

                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select mb-3" name="medicine_equipment_id[]" aria-label="Default select example">
                                            @foreach($medicineEquipments as $allTherapyIngredients)
                                            <option value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Add New Medical Equipment
                                        </button>
                                    </td>
                                </tr>
                            </table>
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
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="medicine_equipment_id[]" aria-label="Default select example">' +
            '@foreach($medicineEquipments as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $(".dynamic-ar").click(function () {
        ++i;
        $(".dynamicAddRemove").append('<tr id="mDelete'+i+'">' +
            '<td>' +
            ' <select class="form-select mb-3" name="medicine_equipment_id[]" aria-label="Default select example">' +
            '@foreach($medicineEquipments as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '[id^=remove-input-fieldd]', function () {

var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(19);

//alert(id_for_pass);

$("#mDelete"+id_for_pass).remove();

//$(this).parents('tr').remove();
});
</script>
@endsection
