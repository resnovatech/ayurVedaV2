@extends('admin.master.master')

@section('title')
Other Equipment Form | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Other Equipment  Form</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                            <li class="breadcrumb-item active">Other Equipment  Form</li>
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
                        <h4 class="card-title mb-0"> Create Other Equipment</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">

                        <form action="{{ route('otherEquipment.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            <div class="row">

                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Equipment Type</label>



                                    <select required name ="equipmentType" id="equipmentType" class="form-control">
                                        <option value="">--Select One --</option>

        <option value="normal">Normal</option>
        <option value="mixer">Mixer</option>
        </select>



                                </div>


                                <div class="col-12 mb-2" >
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" value=""
                                           class="form-control"/>
                                </div>

                                <div id="myDivtwo">
                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Ingredient Detail</label>
                                    <select name ="category" class="form-control" id=""  >
                                        <option value="">--Please select --</option>
                                        @foreach($therapyIngredients as $key=>$allTherapyIngredients)


        <option value="{{ $allTherapyIngredients->name }}-1">{{ $allTherapyIngredients->name }}</option>
                                        @endforeach

                                        @foreach($medicineEquipments as $key=>$allmedicineEquipment)

                                        <option value="{{ $allmedicineEquipment->name }}-2">{{ $allmedicineEquipment->name }}</option>
                                        @endforeach


                                        @foreach($otherIngredients as $key=>$allmedicineEquipment)

                                        <option value="{{ $allmedicineEquipment->name }}-3">{{ $allmedicineEquipment->name }}</option>
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



                                    <select name ="unit" class="form-control">
                                        <option>--Select One --</option>

        <option value="gram">gram</option>
        <option value="pics">pics</option>
        </select>



                                </div>

                            </div>


                            <!--new code start --->


                            <div id="myDivOne">

                                <div class="col-12 mb-2">

                                    <table class="table table-bordered mt-3" id="dynamicAddRemove">
                                        <tr>
                                            <th>Ingredient Name</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th></th>
                                        </tr>

                                        <tr>
                                            <td>

                                                <select name ="category[]" class="form-control" id=""  >
                                                    <option value="">--Please select --</option>
                                                    @foreach($therapyIngredients as $key=>$allTherapyIngredients)


                    <option value="{{ $allTherapyIngredients->name }}-1">{{ $allTherapyIngredients->name }}</option>
                                                    @endforeach

                                                    @foreach($medicineEquipments as $key=>$allmedicineEquipment)

                                                    <option value="{{ $allmedicineEquipment->name }}-2">{{ $allmedicineEquipment->name }}</option>
                                                    @endforeach


                                                    @foreach($otherIngredients as $key=>$allmedicineEquipment)

                                                    <option value="{{ $allmedicineEquipment->name }}-3">{{ $allmedicineEquipment->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>

                                                <input type="text" name="quantity[]" value=""
                                                       class="form-control"/>
                                            </td>

                                            <td>




                                                <select name ="unit[]" class="form-control">
                                                    <option>--Select One --</option>

                    <option value="gram">gram</option>
                    <option value="pics">pics</option>
                    </select>
                                            </td>

                                            <td>
                                                <button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Add New Ingredient
                                        </button>
                                            </td>

                                        </tr>
                                    </table>

                                </div>

                            </div>


                            <!--new code end -->

                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
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

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<select name ="category[]" class="form-control" id=""  >' +
            '<option value="">--Please select --</option> @foreach($therapyIngredients as $key=>$allTherapyIngredients)<option value="{{ $allTherapyIngredients->name }}-1">{{ $allTherapyIngredients->name }}</option>@endforeach @foreach($medicineEquipments as $key=>$allmedicineEquipment)<option value="{{ $allmedicineEquipment->name }}-2">{{ $allmedicineEquipment->name }}</option>@endforeach @foreach($otherIngredients as $key=>$allmedicineEquipment)<option value="{{ $allmedicineEquipment->name }}-3">{{ $allmedicineEquipment->name }}</option>@endforeach' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity[]" value="" class="form-control"/></td>' +
            '<td>' +
            ' <select class="form-select mb-3" name="unit[]" aria-label="Default select example">' +
            ' <option value="gram">gram</option><option value="pics">pics</option></select>' +
            '</td>' +
            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>



<script>
    $(document).ready(function(){


    //   $("#equipmentType").change(function(){


    //     alert("The text has been changed.");



    //   });


    $(function() {
    $('#myDivtwo').hide();
    $('#myDivOne').hide();
    $('#equipmentType').change(function(){
        if($(this).val() == 'mixer') {
            $('#myDivtwo').hide();
            $('#myDivOne').show();
        } else {
            $('#myDivtwo').show();
            $('#myDivOne').hide();
        }
    });
});



    });
    </script>




@endsection
