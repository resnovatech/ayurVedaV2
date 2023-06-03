<?php

$therapList = DB::table('therapy_lists')->latest()->get();

?>
    <div class="col-lg-12">

            <label for="" class="form-label">Therapy List</label>
            <select name ="therapy_id[]" class="form-control" id="therapy_id" required>
                <option value="">--Please Select--</option>
                @foreach($therapList as $allTherapList)
                <option value="{{ $allTherapList->id }}">{{ $allTherapList->name }}</option>
                @endforeach

            </select>

    </div>

    <div class="col-lg-12" id="showIngList">

    </div>


    <script>

        ////
        $('#therapy_id').change(function(){

            var getMainVal = $(this).val();



            $.ajax({
                url: "{{ route('therapyListForSingleTherapy') }}",
                method: 'GET',
                data: {getMainVal:getMainVal},
                success: function(data) {

                    //alert(data);

                  $("#showIngList").html('');
                  $("#showIngList").html(data);
                }
            });


        });
        //////


        </script>

