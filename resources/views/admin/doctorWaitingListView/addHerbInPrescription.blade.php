@extends('admin.master.master')
@section('title')
Add Herb In Prescription | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Herb In Prescription </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Herb In Prescription Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('postHerbInPrescription') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Add Herb</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
<?php

$packages =DB::table('packages')->latest()->get();


?>

                            <div class="col-12">
                                <label for="" class="form-label">Package Type</label>
                                <select name ="package _type" class="form-control" id="package_type" required>
                                    <option value="">--Please Select--</option>
                                    @foreach($packages as $key=>$allpackagesLists)
                                    <option value="{{ $allpackagesLists->id }}">{{ $allpackagesLists->name }}</option>
                                  @endforeach
                                </select>
                            </div>

                            <div class="mt-3" id="showDataaa">
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary w-sm">Submit
                </button>
            </div>
        </form>

    </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
    ////
    $('#package_type').change(function(){

        var getMainVal = $(this).val();



        $.ajax({
            url: "{{ route('typeOfHerb') }}",
            method: 'GET',
            data: {getMainVal:getMainVal},
            success: function(data) {

                //alert(data);

              $("#showDataaa").html('');
              $("#showDataaa").html(data);
            }
        });


    });
    //////


    </script>







    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar2").click(function () {
            ++i;
            $("#dynamicAddRemove2").append('<tr>' +
                '<td>' +
                ' <select class="form-select herb_type mb-3" id="herb_type'+i+'"  name="herb_type[]" required aria-label="Default select example">' +
                '<option value="">--- Please Select ---</option><option value="Medicine">Medicine</option><option value="Tablet">Tablet</option>' +
                '</td>' +
                '<td>'+
                '<div id="showType'+i+'"><div>'
               +
                '</td>'+
                '<td>' +
                '<input type="text" required class="form-control" id="hquantity0" name="hquantity[]"></td>' +
                '<td>'+
                '<input type="text" required class="form-control" id="hunit'+i+'" name="hunit[]">'+

                '</td>'+
                '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">
        $(document).on('change', 'select.herb_type', function () {

            var main_id = $(this).attr('id');
           var getMainVal = main_id.slice(9);
           var herb_type = $(this).val();
        //    showDataCategoryWise
        //    alert(get_id_from_main);

        $.ajax({
            url: "{{ route('showDataCategoryWise') }}",
            method: 'GET',
            data: {getMainVal:getMainVal,herb_type:herb_type},
            success: function(data) {

                //alert(data);

              $("#showType"+getMainVal).html('');
              $("#showType"+getMainVal).html(data);
            }
        });

        });
    </script>
@endsection
