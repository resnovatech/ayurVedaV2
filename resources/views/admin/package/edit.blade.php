@extends('admin.master.master')

@section('title')
Package | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Package</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Package</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Update Package Information</h4>
                    </div><!-- end card header -->
                    <div class="card-body">

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
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->








    </div>

    <!-- End Page-content -->

</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin

    });
});
</script>

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
            '<button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
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
