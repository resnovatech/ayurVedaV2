<?php

$therapyPackageList = DB::table('therapy_packages')->latest()->get();

?>
    <div class="col-lg-12">

            <label for="" class="form-label">Therapy Package List</label>
            <select name ="therapy_package_id" class="form-control" id="therapy_package_id" required>
                <option value="">--Please Select--</option>
                @foreach($therapyPackageList as $allTherapList)
                <option value="{{ $allTherapList->id }}">{{ $allTherapList->package_name }}</option>
                @endforeach

            </select>

    </div>

    <div class="col-lg-12" id="showIngListP">

    </div>

    <script>

        ////
        $('#therapy_package_id').change(function(){

            var getMainVal = $(this).val();



            $.ajax({
                url: "{{ route('therapyPackageListForSingleTherapy') }}",
                method: 'GET',
                data: {getMainVal:getMainVal},
                success: function(data) {

                    //alert(data);

                  $("#showIngListP").html('');
                  $("#showIngListP").html(data);
                }
            });


        });
        //////


        </script>
