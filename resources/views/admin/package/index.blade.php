@extends('admin.master.master')

@section('title')
Package List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Package List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Package List</li>
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
                        <h4 class="card-title mb-0">Package Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-add-line align-bottom me-1"></i> Add New Package Info </button>

                                    </div>
                                </div>

                            </div>


                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Sl</th>
                                        <th class="sort" data-sort="customer_name"> Name</th>
                                        <th class="sort" data-sort="customer_name"> Amount</th>
                                        <th class="sort" data-sort="customer_name">Powder Name</th>
                                        <th class="sort" data-sort="customer_name">Powder Amount</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                        @foreach($packages as $key=>$allpackagesLists)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allpackagesLists->name }}</td>

                                        <td class="customer_name">{{ $allpackagesLists->amount }}</td>
                                        <td>

                                            {{ $allpackagesLists->powder_id }}
                                        </td>

                                        <td>

                                            {{ $allpackagesLists->powder_amount }}
                                        </td>
                                        <td>



                                            @if (Auth::guard('admin')->user()->can('packageUpdate'))
                                            <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $allpackagesLists->id }}"
                                            class="btn btn-primary waves-light waves-effect  btn-sm" >
                                            <i class="ri-pencil-fill"></i></button>

                                              <!--  Large modal example -->
                                              <div class="modal fade bs-example-modal-lg{{ $allpackagesLists->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" id="myLargeModalLabel">Update Therapy  Info</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                              </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="{{ route('packageList.update',$allpackagesLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Name</label>
                                                                        <input type="text" value="{{ $allpackagesLists->name }}" name ="name" class="form-control" id="" placeholder="Name" required>
                                                                    </div>





                                                                    <?php
                                                                    $convert_new_ass_cat  = explode(",",$allpackagesLists->powder_id);
                                                                    $powderAmount  = explode(",",$allpackagesLists->powder_amount);
                                                              

                                                                                       ?>

                                                                    <div class="col-12">
                                                                        <table class="table table-bordered dynamicAddRemove" id="">
                                                                            <tr>
                                                                                <th>Powders</th>
                                                                                <th>Price</th>
                                                                            </tr>
                                                                            @foreach($convert_new_ass_cat as $j=>$allTherapyIngredient)
                                                                            @foreach($powderAmount as $allpowderAmount)
                                                                            @if($j == 0 )
                                                                            <tr id="mDelete{{ $j+50000 }}">
                                                                                <td>
                                                                                    <select class="form-select mb-3" id="editPowderId0" name="powder_id[]" aria-label="Default select example">
                                                                                        @foreach($powders as $allpowders)

                                                                                        <option data-amount="{{ $allpowders->amount }}" value="{{ $allpowders->name }}" {{ $allTherapyIngredient ==  $allpowders->name ? 'selected':'' }}>{{ $allpowders->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </td>
                                                                                <td> <input readonly type="text" id="editPamountId0" name ="pamount[]" class="form-control" value="{{ $allpowderAmount }}" placeholder="Amount" required></td>
                                                                                <td>

                                                                                    <button type="button" name="add"  id=""
                                                                                            class="btn btn-outline-primary dynamic-ar">Add New Equipment
                                                                                    </button>




                                                                                </td>
                                                                            </tr>
                                                                            @else
                                                                            <tr id="mDelete{{ $j+50000 }}">
                                                                                <td>
                                                                                    <select class="form-select mb-3" id="editPowderId0" name="powder_id[]" aria-label="Default select example">
                                                                                        @foreach($powders as $allpowders)

                                                                                        <option data-amount="{{ $allpowders->amount }}" value="{{ $allpowders->name }}" {{ $allTherapyIngredient ==  $allpowders->name ? 'selected':'' }}>{{ $allpowders->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </td>
                                                                                <td> <input readonly type="text" id="editPamountId0" name ="pamount[]" class="form-control" value="{{ $allpowderAmount }}" placeholder="Amount" required></td>
                                                                                <td>



                                                                                    <button type="button" id="remove-input-fieldd{{ $j+50000 }}" class="btn btn-outline-danger ">Delete</button>


                                                                                </td>
                                                                            </tr>
                                                                            @endif
                                                                            @endforeach
                                                                            @endforeach
                                                                        </table>
                                                                    </div>

                                                                    <div class="col-12 mb-2">
                                                                        <label for="" class="form-label">Amount</label>
                                                                        <input type="text" value="{{ $allpackagesLists->amount }}" name ="amount" class="form-control" id="editMainAmount" placeholder="Amount" required>
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

                                    @if (Auth::guard('admin')->user()->can('packageDelete'))

  <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allpackagesLists->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
  <form id="delete-form-{{ $allpackagesLists->id }}" action="{{ route('packageList.destroy',$allpackagesLists->id) }}" method="POST" style="display: none;">
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
                <h5 class="modal-title" id="myModalLabel">Package Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('packageList.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name ="name" class="form-control" id="" placeholder="Name" required>
                        </div>



                        <div class="col-12">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Powders</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select mb-3" id="powderId0" name="powder_id[]" aria-label="Default select example">
                                            <option value="">--Please Select -- </option>
                                            @foreach($powders as $allTherapyIngredients)
                                            <option data-amount="{{ $allTherapyIngredients->amount }}" value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td> <input readonly type="text" id="pamountId0" name ="pamount[]" class="form-control" id="" placeholder="Amount" required></td>
<td></td>
                                    <td>
                                        <button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Add New Powder
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Amount</label>
                            <input type="text" value="0"  name ="amount" class="form-control" id="mainAmount" placeholder="Amount" required>
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
            ' <select class="form-select mb-3" id="powderId'+i+'" name="powder_id[]" aria-label="Default select example">' +
            '<option value="">--Please Select -- </option>@foreach($powders as $allTherapyIngredients)<option data-amount="{{ $allTherapyIngredients->amount }}" value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" readonly id="pamountId'+i+'" name="pamount[]"  class="form-control" /></td>' +
            '<td>' +
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();


        var final_total_net_price = 0;
    var total_net_price = $('input[name="pamount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#mainAmount').val('');
         $('#mainAmount').val(final_total_net_price);
    });


    ////


    $(document).on('change', '[id^=powderId]', function () {

var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(8);

var getAmount = $('#powderId'+id_for_pass).find(':selected').data('amount');

var previousVal = $("#pamountId"+id_for_pass).val();
var getTheValue = $('#mainAmount').val();

var minusValue = getTheValue -previousVal;

if(minusValue == 0){

$("#pamountId"+id_for_pass).val(getAmount);

var finalValue =  parseInt(getAmount);

$('#mainAmount').val(getAmount);

}
if(minusValue > 0){

$("#pamountId"+id_for_pass).val(getAmount);

var finalValue = parseInt(minusValue) + parseInt(getAmount);

$('#mainAmount').val(finalValue);

}
});


////////

$(document).on('change', '[id^=editPowderId]', function () {

var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(12);

//alert(id_for_pass);

var getAmount = $('#editPowderId'+id_for_pass).find(':selected').data('amount');

var previousVal = $("#editPamountId"+id_for_pass).val();
var getTheValue = $('#editMainAmount').val();

var minusValue = getTheValue -previousVal;

if(minusValue == 0){

$("#editPamountId"+id_for_pass).val(getAmount);

var finalValue =  parseInt(getAmount);

//$('#editMainAmount').val(getAmount);

}
if(minusValue > 0){

$("#editPamountId"+id_for_pass).val(getAmount);

var finalValue = parseInt(minusValue) + parseInt(getAmount);

//$('#editMainAmount').val(finalValue);

}

var final_total_net_price = 0;
    var total_net_price = $('input[name="pamount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#editMainAmount').val('');
         $('#editMainAmount').val(final_total_net_price);
});
</script>

<script type="text/javascript">
    var i = 0;
    $(".dynamic-ar").click(function () {
        ++i;
        $(".dynamicAddRemove").append('<tr id="mDelete'+i+'">' +
            '<td>' +
            ' <select class="form-select mb-3" id="editPowderId'+i+'" name="powder_id[]" aria-label="Default select example">' +
            '@foreach($powders as $allTherapyIngredients)<option data-amount="{{ $allTherapyIngredients->amount }}" value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" readonly id="editPamountId'+i+'" name="pamount[]"  class="form-control" /></td>' +
            '<td>' +
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '[id^=remove-input-fieldd]', function () {

var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(19);

//alert(id_for_pass);

$("#mDelete"+id_for_pass).remove();


var final_total_net_price = 0;
    var total_net_price = $('input[name="pamount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#editMainAmount').val('');
         $('#editMainAmount').val(final_total_net_price);


//$(this).parents('tr').remove();
});
</script>
@endsection
