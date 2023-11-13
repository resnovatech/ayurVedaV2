@extends('admin.master.master')

@section('title')
Create A Mixer | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Mixer List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Mixer List</li>
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
                        <h4 class="card-title mb-0">Mixer Info</h4>
                        @include('flash_message')
                    </div><!-- end card header -->

                    <div class="card-body">
                        
                         <form action="{{ route('inventoryMixerStore') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Name</label>
                            <select name ="name" class="form-control js-example-basic-single" id="" placeholder="Name" required>
                                <option value="">--Please Select--</option>
                                @foreach($medicineEquipments as $medicineEquipmentsAll)
                                 <option value="{{$medicineEquipmentsAll->name}}">{{$medicineEquipmentsAll->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="col-12 mb-2">
                            <label for="" class="form-label">Mixer List</label>
                            <select class="js-example-basic-multiple" name="mixerList[]" multiple="multiple">
                                <option value="">--Please Select--</option>
                                @foreach($medicineEquipments as $medicineEquipmentsAll)
                                 <option value="{{$medicineEquipmentsAll->name}}">{{$medicineEquipmentsAll->name}}</option>
                                @endforeach
                            </select>
                        </div>



                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                   
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
 </div>
        </div>
@endsection