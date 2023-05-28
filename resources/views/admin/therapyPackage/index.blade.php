@extends('admin.master.master')

@section('title')
Therapy Package List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Therapy Package List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Therapy Package List</li>
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
                        <h4 class="card-title mb-0">Therapy Package Info</h4>
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
                                        <th class="sort" data-sort="customer_name"> Package Name</th>
                                        <th class="sort" data-sort="customer_name"> Amount</th>
                                        <th class="sort" data-sort="customer_name">Therapy Name</th>

                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                        @foreach($packages as $key=>$allpackagesLists)
                                    <tr>

                                        <td class="id">{{ $key+1 }}</td>
                                        <td class="customer_name">{{ $allpackagesLists->package_name }}</td>

                                        <td class="customer_name">{{ $allpackagesLists->price }}</td>
                                        <td>

                                            {{ $allpackagesLists->therapy_list }}
                                        </td>


                                        <td>



                                            @if (Auth::guard('admin')->user()->can('therapyPackagesUpdate'))
                                            <a type="button" href="{{ route('therapyPackages.edit',$allpackagesLists->id) }}"
                                            class="btn btn-primary waves-light waves-effect  btn-sm" >
                                            <i class="ri-pencil-fill"></i></a>

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

                                                          </div>
                                                      </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                              </div><!-- /.modal -->


  @endif

  {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                    @if (Auth::guard('admin')->user()->can('therapyPackagesDelete'))

  <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allpackagesLists->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
  <form id="delete-form-{{ $allpackagesLists->id }}" action="{{ route('therapyPackages.destroy',$allpackagesLists->id) }}" method="POST" style="display: none;">
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
                <form action="{{ route('therapyPackages.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name ="package_name" class="form-control" id="" placeholder="Name" required>
                        </div>



                        <div class="col-12">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Therapy Name</th>

                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-select mb-3" id="powderId0" name="therapy_list[]" aria-label="Default select example">
                                            <option value="">--Please Select -- </option>
                                            @foreach($therapLists as $allTherapyIngredients)
                                            <option value="{{ $allTherapyIngredients->name }}">{{ $allTherapyIngredients->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Add New Therapy
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Amount</label>
                            <input type="text" value="0"  name ="price" class="form-control" id="mainAmount" placeholder="Amount" required>
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
