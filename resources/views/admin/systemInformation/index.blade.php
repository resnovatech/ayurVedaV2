@extends('admin.master.master')

@section('title')
System Information
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">System Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">System Information</li>
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
                        @include('flash_message')
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>


                               @if(count($systemInformation) >= 1)
                               <h5 class="card-title mb-0">SYSTEM INFORMATION</h5>

                               @else

                                    <button class="btn btn-primary add-btn" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ri-add-line align-bottom me-1"></i>  Add Information
                                                                        </button>


                                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Information</h1>
                                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" action="{{ route('systemInformation.store') }}" enctype="multipart/form-data">
                                                                                        @csrf

                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="mb-4">
                                                                                                    <label for="formrow-email-input" class="form-label"> Name</label>
                                                                                                    <input type="text" name="name"  class="form-control" placeholder="Company Name" required>
                                                                                                    <small></small>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="mb-4">
                                                                                                    <label for="formFile" class="form-label"> Logo</label>
                                                                                                    <input name="logo" value="" class="form-control" type="file" id="formFile" required>

                                                                                                </div>
                                                                                            </div>


                                                                                            <div class="col-md-6">
                                                                                                <div class="mb-4">
                                                                                                    <label for="formFile" class="form-label"> Icon</label>
                                                                                                    <input name="icon" value="" class="form-control" type="file" id="formFile" required>

                                                                                                </div>
                                                                                            </div>







                                                                                            <div class="col-md-6">
                                                                                                <div class="mb-4">
                                                                                                    <label for="formrow-inputZip" class="form-label">Phone Number</label>
                                                                                                    <input name="phone"  type="text" class="form-control" id="formrow-inputZip" placeholder="Phone Number" required>
                                                                                                    <small></small>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="mb-4">
                                                                                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                                                                                    <input name="email"  type="email" class="form-control" id="formrow-inputZip" placeholder="Email id" required>
                                                                                                    <small></small>
                                                                                                </div>
                                                                                            </div>





                                                                                            <div class="col-md-6">
                                                                                                <div class="mb-4">
                                                                                                    <label for="formrow-email-input" class="form-label">Address</label>
                                                                                                    <input name="address"  type="text" class="form-control" id="formrow-email-input" placeholder="Address" required>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>






                                                                                        <div>
                                                                                            <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                                                                                        </div>


                                                                                    </form>
                                                                                </div>

                                                                              </div>
                                                                            </div>
                                                                          </div>

@endif

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($systemInformation as $key=>$allSystemInformation)
                                <tr>
                                    <td><img src="{{ asset('/') }}{{ $allSystemInformation->logo }}" style="height:20px;"/></td>
                                    <td><img src="{{ asset('/') }}{{ $allSystemInformation->icon }}" style="height:20px;"/></td>
                                    <td>{{ $allSystemInformation->name }}</td>
                                    <td>{{ $allSystemInformation->phone }}</td>
                                    <td>{{ $allSystemInformation->email }}</td>
                                    <td>{{ $allSystemInformation->address }}</td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>


                                        <div class="modal fade" id="exampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Update Information</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('systemInformation.update',$allSystemInformation->id)}}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-4">
                                                                    <label for="formrow-email-input" class="form-label"> Name</label>
                                                                    <input type="text" name="name" value="{{ $allSystemInformation->name }}"  class="form-control" placeholder="Company Name" required>
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-4">
                                                                    <label for="formFile" class="form-label"> Logo</label>
                                                                    <input name="logo" value="" class="form-control" type="file" id="formFile" >
                                                                    <img src="{{ asset('/') }}{{ $allSystemInformation->logo }}" style="height:20px;"/>

                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="mb-4">
                                                                    <label for="formFile" class="form-label"> Icon</label>
                                                                    <input name="icon" value="" class="form-control" type="file" id="formFile" >
                                                                    <img src="{{ asset('/') }}{{ $allSystemInformation->icon }}" style="height:20px;"/>
                                                                </div>
                                                            </div>







                                                            <div class="col-md-6">
                                                                <div class="mb-4">
                                                                    <label for="formrow-inputZip" class="form-label">Phone Number</label>
                                                                    <input name="phone" value="{{ $allSystemInformation->phone }}"   type="text" class="form-control" id="formrow-inputZip" placeholder="Phone Number" required>
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-4">
                                                                    <label for="formrow-inputZip" class="form-label">Email</label>
                                                                    <input name="email" value="{{ $allSystemInformation->email }}"   type="email" class="form-control" id="formrow-inputZip" placeholder="Email id" required>
                                                                    <small></small>
                                                                </div>
                                                            </div>





                                                            <div class="col-md-6">
                                                                <div class="mb-4">
                                                                    <label for="formrow-email-input" class="form-label">Address</label>
                                                                    <input name="address" value="{{ $allSystemInformation->address }}"   type="text" class="form-control" id="formrow-email-input" placeholder="Address" required>
                                                                </div>
                                                            </div>


                                                        </div>






                                                        <div>
                                                            <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                                                        </div>


                                                    </form>
                                                </div>

                                              </div>
                                            </div>
                                          </div>

                                    </td>
                                </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div><!--end row-->




    </div>
    <!-- container-fluid -->
</div>
@endsection


@section('script')
@endsection
