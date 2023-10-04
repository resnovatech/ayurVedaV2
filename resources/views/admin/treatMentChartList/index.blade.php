@extends('admin.master.master')

@section('title')
TreatMent Chart List
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">TreatMent Chart Information</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                            <li class="breadcrumb-item active">TreatMent Chart Information</li>
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
                        <h4 class="card-title mb-0">TreatMent Chart Info</h4>
                    </div><!-- end card header -->

                    <div class="card-body">


                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-primary add-btn" onclick="location.href='{{ route('treatMentChart.create') }}'"><i class="ri-add-line align-bottom me-1"></i> Add New TreatMent Chart</button>

                                </div>
                            </div>

                        </div>

                                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                    <thead >
                                    <tr>
                                        <th >Sl</th>
                                        <th>Appoinment Date</th>
                                        <th>Therapist Name</th>
                                        <th>Therapy/Facepack/Herb/Medical Supplicant Name</th>
                                        <th>Type</th>
                                        <th >Time Of The Day</th>
                                        <th >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                        @foreach($treatMentChartList as $key=>$allTreatMentChartList)
                                        <tr>
                                        <td >{{ $key+1 }}</td>
                                        <td>{{  date("d-m-Y", strtotime($allTreatMentChartList->appointment_date))  }}</td>
                                        <td>

                                            <?php
                                            $getNameTherapist = DB::table('therapists')
                                                        ->where('id',$allTreatMentChartList->therapist)->value('name');

                                                                ?>

                                                                {{ $getNameTherapist }}


                                        </td>
                                        <td>


                                            @if($allTreatMentChartList->status == 'therapy')
                                            <?php
                                            $therapyName = DB::table('therapy_lists')->where('id',$allTreatMentChartList->therapy_id)->value('name');

                                                ?>
                                            {{ $therapyName }}

                                            @elseif($allTreatMentChartList->status == 'facepack')


                                            <?php
                                            $therapyName = DB::table('face_packs')->where('id',$allTreatMentChartList->therapy_id)->value('pack_name');

                                                ?>
                                            {{ $therapyName }}

                                            @else


                                            {{ $allTreatMentChartList->therapy_id }}

                                            @endif


                                        </td>
                                        <td>
                                            {{ $allTreatMentChartList->status }}

                                        </td>
                                        <td>{{ $allTreatMentChartList->time_of_the_day }}</td>

                                        <td>



                                            <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $allTreatMentChartList->id}})" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-5-fill"></i></button>
                                            <form id="delete-form-{{ $allTreatMentChartList->id }}" action="{{ route('treatMentChart.destroy',$allTreatMentChartList->id) }}" method="POST" style="display: none;">
                                              @method('DELETE')
                                                                            @csrf

                                                                        </form>



                                        </td>

                                       </tr>

                                        @endforeach


                                    </tbody>
                                </table>





                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection


@section('script')
@endsection
