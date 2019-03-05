@extends('doctor.layouts.app')

@section('content')

    @include('doctor.inc.messages')
    <div class="container-fluid mt--8">

        <div class="card">
            <div class="card-header">
                Add Check up Record for Patient ID: {{$id}}
            </div>
            <div class="card-body">
                <div class="row">
                    <form method="post" action="{{ route('checkuprecords.store') }}">
                    <div class="col-md-6 required">
                        <div class="form-group">
                            {{--DROPDOWN--}}
                            <select name="messagetype" id="messagetype" class="selectpicker" data-style="select-with-transition"
                                    title="Month Type" data-size="7" onchange="fun_showtextbox()">

                                <option value="-">Select Month</option>
                                <option value="1">First Month</option>
                                <option value="2">Second Month</option>
                                <option value="3">Third Month</option>
                                <option value="4">Fourth Month</option>
                                <option value="5">Fifth Month</option>
                                <option value="6">Sixth Month</option>
                                <option value="7">Seventh Month</option>
                                <option value="8">Eighth Month</option>
                                <option value="9">Ninth Month</option>
                            </select>
                        </div>
                    </div>
                        {{--FIRST MONTH CHECKLIST--}}
                    <div class="form-group label-floating is-empty" style="display: none" id="first_month">
                        <h2>FIRST MONTH: DOCTOR'S DATE</h2>
                        <p>OVERALL HEALTH</p>
                        <h3>Doctor's Checklist</h3>
                        <input type="checkbox" name="first_month" value="check"/> Blood Test <br/>
                        <input type="checkbox" name="first_month" value="check"/> Urine Check <br/>
                        <input type="checkbox" name="first_month" value="check"/> Blood Pressure Check <br/>
                        <input type="checkbox" name="first_month" value="check"/> Ultrasound Scan <br/>
                        <br>
                        <h3>First Prenatal Visit</h3>
                        <input type="checkbox" name="first_month" value="visit"/> Complete Blood Count <br/>
                        <input type="checkbox" name="first_month" value="check"/> Blood Type and Rh factor <br/>
                        <input type="checkbox" name="first_month" value="check"/> Urinalysis <br/>
                        <input type="checkbox" name="first_month" value="check"/> Papsmear <br/>
                        <input type="checkbox" name="first_month" value="check"/> HbsAg <br/>
                        <input type="checkbox" name="first_month" value="check"/> RPR/VDRL <br/>
                        <input type="checkbox" name="first_month" value="check"/> Ultrasound (TVS/Pelvic) <br/>
                    </div>

                        {{--SECOND MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="second_month">
                            <h2>SECOND MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="second_month" value="check"/> Blood Pressure Check <br/>
                            <br>
                            <input type="checkbox" name="second_month" value="check"/> Complete Blood Count<br/>
                            <input type="checkbox" name="second_month" value="check"/> Blood Type and Rh Factor Urine Check <br/>
                            <input type="checkbox" name="second_month" value="check"/> Sugar (Check for diabetes, Oral Glucose Tolerance Test<br/>
                            <input type="checkbox" name="second_month" value="check"/> Protein (Check for kidney disease or toxemia) <br/>
                            <input type="checkbox" name="second_month" value="check"/> Bacteria (Check for kidney or bladder infection <br/>
                            <br>
                            <input type="checkbox" name="second_month" value="check"/> Ultrasound - Congenital Anomaly <br/>
                            <input type="checkbox" name="second_month" value="check"/> Screening (for high risk patients)<br/>
                            <input type="checkbox" name="second_month" value="check"/> Pap Smear <br/>
                            <input type="checkbox" name="second_month" value="check"/> Complete Physical Examination <br/>
                            <input type="checkbox" name="second_month" value="check"/> Pelvic Examination <br/>
                        </div>

                        {{--THIRD MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="third_month">
                            <h2>THIRD MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="third_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="third_month" value="check"/> Ultrasound Examination <br/>
                            <input type="checkbox" name="third_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="third_month" value="check"/> Doppler Check <br/>
                            <input type="checkbox" name="third_month" value="check"/> Group B Streptococcus Screening - rectovaginal culture<br/>
                        </div>

                        {{--FOURTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="fourth_month">
                            <h2>FOURTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="fourth_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="fourth_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="fourth_month" value="check"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="fourth_month" value="check"/> Blood tests <br/>
                        </div>

                        {{--FIFTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="fifth_month">
                            <h2>FIFTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="fifth_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="fifth_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="fifth_month" value="check"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="fifth_month" value="check"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="fifth_month" value="check"/> Blood tests <br/>
                        </div>

                        {{--SIXTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="sixth_month">
                            <h2>SIXTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="sixth_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="sixth_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="sixth_month" value="check"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="sixth_month" value="check"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="sixth_month" value="check"/> Blood tests <br/>
                        </div>

                        {{--SEVENTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="seventh_month">
                            <h2>SEVENTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="seventh_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="seventh_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="seventh_month" value="check"/> Ultrasound <br/>
                            <input type="checkbox" name="seventh_month" value="check"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="seventh_month" value="check"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="seventh_month" value="check"/> Blood tests Rh, if Rh negative<br/>
                        </div>

                        {{--EIGHTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="eighth_month">
                            <h2>EIGHTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="eighth_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="eighth_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="eighth_month" value="check"/> Ultrasound <br/>
                            <input type="checkbox" name="eighth_month" value="check"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="eighth_month" value="check"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="eighth_month" value="check"/> Blood tests<br/>
                        </div>

                        {{--NINTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="ninth_month">
                            <h2>NINTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="ninth_month" value="check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="ninth_month" value="check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="ninth_month" value="check"/> Ultrasound <br/>
                            <input type="checkbox" name="ninth_month" value="check"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="ninth_month" value="check"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="ninth_month" value="check"/> Pelvic examination for changes in your cervix that indicate labor<br/>
                        </div>


                        {{--CHECK-UP RECORD--}}
                        <div class="col-md-9 required">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{$id}}">
                        <label for="name">IE Findings: </label>
                        <input type="text" class="form-control" name="ieFindings"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Blood Pressure: </label>
                        <input type="text" class="form-control" placeholder="e.g. 100/70" name="bloodPressure"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Height: </label>
                        <input type="text" class="form-control" placeholder="e.g. 163 cm" name="height"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Weight: </label>
                        <input type="text" class="form-control" placeholder="e.g. 53.4 kgs" name="weight"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Heart Tones: </label>
                        <input type="text" class="form-control" placeholder="e.g. S1" name="heartTones"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">AOG: </label>
                        <input type="text" class="form-control" placeholder="e.g. 1 week" name="AOG"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Weight Gain: </label>
                        <input type="text" class="form-control" name="weightGain"/>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return val();">Add Checkup record</button>
                    <a href="/patients" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                    </div>

                    </div>
            </div>
        </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '1')
            //.....................^.......
            {
                $("#first_month").show();
            }
            else
            {
                $("#first_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '2')
            //.....................^.......
            {
                $("#second_month").show();
            }
            else
            {
                $("#second_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '3')
            //.....................^.......
            {
                $("#third_month").show();
            }
            else
            {
                $("#third_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '4')
            //.....................^.......
            {
                $("#fourth_month").show();
            }
            else
            {
                $("#fourth_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '5')
            //.....................^.......
            {
                $("#fifth_month").show();
            }
            else
            {
                $("#fifth_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '6')
            //.....................^.......
            {
                $("#sixth_month").show();
            }
            else
            {
                $("#sixth_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '7')
            //.....................^.......
            {
                $("#seventh_month").show();
            }
            else
            {
                $("#seventh_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '8')
            //.....................^.......
            {
                $("#eighth_month").show();
            }
            else
            {
                $("#eighth_month").hide();
            }
        });
    });

    $(document).ready(function(){
        $('#messagetype').on('change', function() {
            if ( this.value == '9')
            //.....................^.......
            {
                $("#ninth_month").show();
            }
            else
            {
                $("#ninth_month").hide();
            }
        });
    });
</script>
    <script>
        function val(){
            var checks = document.getElementsByName('first_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('second_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('third_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('fourth_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('fifth_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('sixth_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('seventh_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('eighth_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }

        function val(){
            var checks = document.getElementsByName('ninth_month');
            var hasChecked = false;
            for (var i = 0; i < checks.length; i++){
                if (checks[i].checked)
                {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false){
                alert("Please select at least one");
                return false;
            }
            return true;
        }
    </script>
@endsection

