@extends('admin.master.master')

@section('title')
Role
@endsection


@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Role Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">Role Information</li>
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


                                    <a href="{{ route('role.create') }}" class="btn btn-primary add-btn" type="button">
                                        <i class="ri-add-line align-bottom me-1"></i>  Add Role
                                    </a>





                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                        <th>sl</th>
                                        <th>Role Name</th>
                                        <th >Permission List</th>
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)

                                <tr>
                                   <td>

                                    {{ $loop->index+1 }}

                                    <td>{{ $role->name }}</td>
                                    <td >



                                        @foreach ($role->permissions as $key=>$perm)


                                        @if(($key+1) == 6)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 12)
                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 18)
                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 24)

                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 30)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 36)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 42)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 48)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 54)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 60)
                                            {{ $perm->name }},<br>

                                            @else
                                            {{ $perm->name }},
                                            @endif


                                        @endforeach

                                    </td>

                                                <td>




                                                        <a href="{{ route('role.edit',$role->id) }}" type="button" class="btn-sm btn btn-primary waves-light waves-effect"><i class="ri-pencil-fill"></i></a>



                                                        <button type="button" class="btn-sm btn btn-danger waves-light waves-effect" onclick="deleteTag({{ $role->id }})"><i class="ri-delete-bin-5-fill"></i></button>

 <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy',$role->id) }}" method="POST" style="display: none;">
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
</div>
@endsection

@section('script')
@endsection
