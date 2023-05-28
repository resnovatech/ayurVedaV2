@extends('admin.master.master')

@section('title')
Therapy Package | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Therapy Package</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Therapy Package</li>
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
                        <form action="{{ route('therapyPackages.update',$allpackagesLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" value="{{ $allpackagesLists->package_name }}" name ="package_name" class="form-control" id="" placeholder="Name" required>
                                </div>





                                <?php
                                $convert_new_ass_cat  = explode(",",$allpackagesLists->therapy_list);



                                                   ?>

                                <div class="col-12">
                                    <table class="table table-bordered dynamicAddRemove" id="">
                                        <tr>
                                            <th>Therapy List</th>

                                        </tr>
                                        @foreach($convert_new_ass_cat as $j=>$allTherapyIngredient)

                                        @if($j == 0 )
                                        <tr id="mDelete{{ $j+50000 }}">
                                            <td>
                                                <select class="form-select mb-3" id="editPowderId0" name="therapy_list[]" aria-label="Default select example">
                                                    @foreach($therapLists as $allpowders)

                                                    <option  value="{{ $allpowders->name }}" {{ $allTherapyIngredient ==  $allpowders->name ? 'selected':'' }}>{{ $allpowders->name }}</option>
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
                                                <select class="form-select mb-3" id="editPowderId0" name="therapy_list[]" aria-label="Default select example">
                                                    @foreach($therapLists as $allpowders)

                                                    <option value="{{ $allpowders->name }}" {{ $allTherapyIngredient ==  $allpowders->name ? 'selected':'' }}>{{ $allpowders->name }}</option>
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

                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Amount</label>
                                    <input type="text" value="{{ $allpackagesLists->price }}" name ="price" class="form-control" id="editMainAmount" placeholder="Amount" required>
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
            ' <select class="form-select mb-3" id="powderId'+i+'" name="therapy_list[]" aria-label="Default select example">' +
            '<option value="">--Please Select -- </option>@foreach($therapLists as $allTherapyIngredients)<option data-amount="{{ $allTherapyIngredients->amount }}" value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();


    });


    ////





////////


</script>

<script type="text/javascript">
    var i = 0;
    $(".dynamic-ar").click(function () {
        ++i;
        $(".dynamicAddRemove").append('<tr id="mDelete'+i+'">' +
            '<td>' +
            ' <select class="form-select mb-3" id="editPowderId'+i+'" name="therapy_list[]" aria-label="Default select example">' +
            '@foreach($therapLists as $allTherapyIngredients)<option data-amount="{{ $allTherapyIngredients->amount }}" value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
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
