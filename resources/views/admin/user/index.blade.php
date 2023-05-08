@extends('admin.master.master')

@section('title')
User List
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
                    <h4 class="mb-sm-0">User List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">User</li>
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


                                    <a data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" class="btn btn-primary add-btn" type="button">
                                        <i class="ri-add-line align-bottom me-1"></i>  Add User
                                    </a>





                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                    <th>SL</th>

                                    <th>Name</th>
                                    <th>Position</th>
                                   <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                   <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->position }}</td>

                                    <td>{{ $user->phone }}</td>

                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                        <span class="badge bg-success mt-1">
                                                {{ $role->name }}
                                        </span>
                                        @endforeach
                                    </td>

                                    <td>{{ $user->created_at->format('d-M-y') }}</td>


                                    <td>

                                          <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="ri-pencil-fill"></i></button>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">

                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">


                                                                    </div>
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="email">Position</label>
                                                                        <input type="text" class="form-control form-control-sm" id="email" name="position" placeholder="Enter Position" value="{{ $user->position }}">
                                                                    </div>




                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                                                                    </div>
                                                                     <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="text">Mobile Number</label>
                                                                        <input type="text" class="form-control form-control-sm" id="text" name="phone" placeholder="Enter Mobile Number" value="{{ $user->phone }}">
                                                                    </div>



                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter Password" value="">
                                                                    </div>
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password_confirmation">Confirm Password</label>
                                                                        <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" placeholder="Enter Password" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password">Assign Role</label><br>
                                                                        <select name="roles[]" id="roles" class="form-control form-control-sm" >
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password_confirmation">Profile Image</label>
                                                                        <input type="file" class="form-control form-control-sm" id="password_confirmation" name="image" placeholder="Enter Image">
                                                                        <img src="{{ asset('/') }}{{ $user->image }}" style="height:30px;"/>
                                                                    </div>





                                                                </div>

                                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->








<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="POST" style="display: none;">
                      @method('DELETE')
                                                    @csrf

                                                </form>

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

<!--  Large modal example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">


                                      <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                  </div>

                  <div class="form-group col-md-6 col-sm-12">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position">
                </div>




                  <div class="form-group col-md-6 col-sm-12">
                      <label for="email">Email</label>
                      <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Email">
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                      <label for="text">Mobile Number</label>
                      <input type="text" class="form-control form-control-sm" id="text" name="phone" placeholder="Enter Mobile Number">
                  </div>



              </div>

              <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                      <label for="password">Password</label>
                      <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter Password">
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                  </div>
              </div>

              <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                      <label for="password">Assign Role</label>
                      <select name="roles[]" id="roles" class="form-control form-control-sm ">
                          @foreach ($roles as $role)
      <option value="{{ $role->name }}">{{ $role->name }}</option>
                          @endforeach
                      </select>
                  </div>
                   <div class="form-group col-md-6 col-sm-12">
                      <label for="password_confirmation">Profile Image</label>
                      <input type="file" class="form-control form-control-sm" id="password_confirmation" name="image" placeholder="Enter Image">
                  </div>


              </div>


                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">
                              <div class="float-right d-none d-md-block">
                                  <div class="form-group mb-4">
                                      <div>
                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                             Submit
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> <!-- end col -->
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('script')

@endsection







