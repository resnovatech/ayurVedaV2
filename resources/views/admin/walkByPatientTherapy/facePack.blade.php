<?php

$facePackageList = DB::table('face_packs')->latest()->get();

?>
<input type="hidden" name="facepackType" value="{{ $getMainVal }}"/>
    <div class="col-lg-12">

            <label for="" class="form-label">Face Package List</label>
            <select name ="face_package_id[]" class="form-control" id="face_package_id" required>
                <option value="">--Please Select--</option>
                @foreach($facePackageList as $allTherapList)
                <option value="{{ $allTherapList->id }}">{{ $allTherapList->pack_name }}</option>
                @endforeach

            </select>

    </div>
