@extends('admin.master.master')

@section('title')
Powder | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Powder</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Powder</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Update Powder Information</h4>
                    </div><!-- end card header -->
                    <div class="card-body">

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
