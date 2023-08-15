@extends('admin.master.master')

@section('title')
Face Pack Info List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Face Pack Info List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Face Pack Info List</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add Face Pack Info </h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="{{ route('facePackInfoList.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
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

                                <h6>Pack Information</h6>
                                <hr>
                                <div class="col-6 mb-2">
                                <label for="" class="form-label">Pack Title</label>
                                <input type="text"  name ="packTitle[]" class="form-control" id="packTitle" placeholder="Pack Title" >

                                <table class="table table-bordered mt-2" id="dynamicAddRemove">
                                    <tr>
                                        <th>Pack Detail</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select mb-3" name="therapy_ingredient_id0[]" aria-label="Default select example">
                                                @foreach($otherIngredients as $allTherapyIngredients)
                                                <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                      <td>
                                            <input type="text" name="quantity0[]" value=""
                                                   class="form-control"/>
                                        </td>

                                        <td>
                                            <button type="button" name="add" id="dynamic-ar"
                                                    class="btn btn-outline-primary">Add New
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                </div>

                                <div class="col-6 mb-2">
                                    <label for="" class="form-label">Pack Title</label>
                                    <input type="text"  name ="packTitle[]" class="form-control" id="packTitle" placeholder="Pack Title" >

                                    <table class="table table-bordered mt-2" id="dynamicAddRemove1">
                                        <tr>
                                            <th>Pack Detail</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-select mb-3" name="therapy_ingredient_id1[]" aria-label="Default select example">
                                                    @foreach($otherIngredients as $allTherapyIngredients)
                                                    <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                          <td>
                                                <input type="text" name="quantity1[]" value=""
                                                       class="form-control"/>
                                            </td>

                                            <td>
                                                <button type="button" name="add" id="dynamic-ar1"
                                                        class="btn btn-outline-primary">Add New
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>

                                    <div class="col-6 mb-2">
                                        <label for="" class="form-label">Pack Title</label>
                                        <input type="text"  name ="packTitle[]" class="form-control" id="packTitle" placeholder="Pack Title" >

                                        <table class="table table-bordered mt-2" id="dynamicAddRemove2">
                                            <tr>
                                                <th>Pack Detail</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-select mb-3" name="therapy_ingredient_id2[]" aria-label="Default select example">
                                                        @foreach($otherIngredients as $allTherapyIngredients)
                                                        <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                              <td>
                                                    <input type="text" name="quantity2[]" value=""
                                                           class="form-control"/>
                                                </td>

                                                <td>
                                                    <button type="button" name="add" id="dynamic-ar2"
                                                            class="btn btn-outline-primary">Add New
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        </div>

                                        <div class="col-6 mb-2">
                                            <label for="" class="form-label">Pack Title</label>
                                            <input type="text"  name ="packTitle[]" class="form-control" id="packTitle" placeholder="Pack Title" >

                                            <table class="table table-bordered mt-2" id="dynamicAddRemove3">
                                                <tr>
                                                    <th>Pack Detail</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-select mb-3" name="therapy_ingredient_id3[]" aria-label="Default select example">
                                                            @foreach($otherIngredients as $allTherapyIngredients)
                                                            <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                  <td>
                                                        <input type="text" name="quantity3[]" value=""
                                                               class="form-control"/>
                                                    </td>

                                                    <td>
                                                        <button type="button" name="add" id="dynamic-ar3"
                                                                class="btn btn-outline-primary">Add New
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <label for="" class="form-label">Pack Title</label>
                                                <input type="text"  name ="packTitle[]" class="form-control" id="packTitle" placeholder="Pack Title" >

                                                <table class="table table-bordered mt-2" id="dynamicAddRemove4">
                                                    <tr>
                                                        <th>Pack Detail</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-select mb-3" name="therapy_ingredient_id4[]" aria-label="Default select example">
                                                                @foreach($otherIngredients as $allTherapyIngredients)
                                                                <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                      <td>
                                                            <input type="text" name="quantity4[]" value=""
                                                                   class="form-control"/>
                                                        </td>

                                                        <td>
                                                            <button type="button" name="add" id="dynamic-ar4"
                                                                    class="btn btn-outline-primary">Add New
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                                </div>


                                                <div class="col-6 mb-2">
                                                    <label for="" class="form-label">Pack Title</label>
                                                    <input type="text"  name ="packTitle[]" class="form-control" id="packTitle" placeholder="Pack Title" >

                                                    <table class="table table-bordered mt-2" id="dynamicAddRemove5">
                                                        <tr>
                                                            <th>Pack Detail</th>
                                                            <th>Quantity</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-select mb-3" name="therapy_ingredient_id5[]" aria-label="Default select example">
                                                                    @foreach($otherIngredients as $allTherapyIngredients)
                                                                    <option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                          <td>
                                                                <input type="text" name="quantity5[]" value=""
                                                                       class="form-control"/>
                                                            </td>

                                                            <td>
                                                                <button type="button" name="add" id="dynamic-ar5"
                                                                        class="btn btn-outline-primary">Add New
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    </div>




                                <div class="col-12">

                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
//add new code
$("#addPack").click(function (){

    var mainFirstData =  sessionStorage.getItem("firstData1");

    if(mainFirstData == null){
       // alert(window.localStorage.getItem("firstData1"));
       var finalResult =   sessionStorage.setItem("firstData1", 1);

       alert(1);

    }else{

        var previousData =  sessionStorage.getItem("firstData1");
        var calResult = previousData + 1;
        var finalResult =  sessionStorage.setItem("firstData1",calResult);

        alert( sessionStorage.setItem("firstData1",5));
    }

   // var firstData = window.localStorage.setItem("firstData", 1);



});
///new code
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
            ' <select class="form-select mb-3" name="therapy_ingredient_id0[]" aria-label="Default select example">' +
            '@foreach($otherIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity0[]"  class="form-control" /></td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar1").click(function () {
        ++i;
        $("#dynamicAddRemove1").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="therapy_ingredient_id1[]" aria-label="Default select example">' +
            '@foreach($otherIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity1[]"  class="form-control" /></td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar2").click(function () {
        ++i;
        $("#dynamicAddRemove2").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="therapy_ingredient_id2[]" aria-label="Default select example">' +
            '@foreach($otherIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity2[]"  class="form-control" /></td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar3").click(function () {
        ++i;
        $("#dynamicAddRemove3").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="therapy_ingredient_id3[]" aria-label="Default select example">' +
            '@foreach($otherIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity3[]"  class="form-control" /></td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar4").click(function () {
        ++i;
        $("#dynamicAddRemove4").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="therapy_ingredient_id4[]" aria-label="Default select example">' +
            '@foreach($otherIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity4[]"  class="form-control" /></td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar5").click(function () {
        ++i;
        $("#dynamicAddRemove5").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="therapy_ingredient_id5[]" aria-label="Default select example">' +
            '@foreach($otherIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->name }}</option>@endforeach</select>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="quantity5[]"  class="form-control" /></td>' +

            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
