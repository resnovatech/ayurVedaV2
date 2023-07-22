@extends('admin.master.master')
@section('title')
Add Therapy In Prescription | {{ $ins_name }}
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
                    <h4 class="mb-sm-0">Add Therapy In Prescription </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Therapy In Prescription Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('postTherapyTypeInPrescription') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Therapy</h4>
                    </div><!-- end card header -->
                    <div class="card-body">


                        <div class="col-12">
                            <label for="" class="form-label">Therapy Type</label>
                            <select name ="therapy_type" class="form-control" id="therapy_type" required>
                                <option value="">--Please Select--</option>
                                <option value="Single">Single</option>
                                <option value="Package">Package</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="" class="form-label">Quantity</label>
                            <input type="text" name="amount" required value=""
                            class="form-control"/>
                        </div>

                        <div class="row mt-3" id="showDataaa">
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
    $('#therapy_type').change(function(){

        var getMainVal = $(this).val();



        $.ajax({
            url: "{{ route('getTherapyTypeInPrescription') }}",
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
@endsection
