@extends('doctor.layouts.app')

@section('content')

    {{--@include('doctor.inc.messages')--}}
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
                            <select name="dropdown" id="messagetype" class="selectpicker" data-style="select-with-transition"
                                    title="Month Type" data-size="7" onchange="fun_showtextbox()">

                                <option value="-">Select Month</option>
                                <option value="First Month">First Month</option>
                                <option value="Second Month">Second Month</option>
                                <option value="Third Month">Third Month</option>
                                <option value="Fourth Month">Fourth Month</option>
                                <option value="Fifth Month">Fifth Month</option>
                                <option value="Sixth Month">Sixth Month</option>
                                <option value="Seventh Month">Seventh Month</option>
                                <option value="Eighth Month">Eighth Month</option>
                                <option value="Ninth Month">Ninth Month</option>
                            </select>
                        </div>
                    </div>
                        {{--FIRST MONTH CHECKLIST--}}
                    <div class="form-group label-floating is-empty" style="display: none" id="first_month">
                        <h2>FIRST MONTH: DOCTOR'S DATE</h2>
                        <p>OVERALL HEALTH</p>
                        <h3>Doctor's Checklist</h3>
                        <input type="checkbox" name="option[]" value="Blood Test"/> Blood Test <br/>
                        <input type="checkbox" name="option[]" value="Urine Check"/> Urine Check <br/>
                        <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                        <input type="checkbox" name="option[]" value="Ultrasound Scan"/> Ultrasound Scan <br/>
                        <br>
                        <h3>First Prenatal Visit</h3>
                        <input type="checkbox" name="option[]" value="Complete Blood Count"/> Complete Blood Count <br/>
                        <input type="checkbox" name="option[]" value="Blood Type and Rh factor"/> Blood Type and Rh factor <br/>
                        <input type="checkbox" name="option[]" value="Urinalysis"/> Urinalysis <br/>
                        <input type="checkbox" name="option[]" value="Papsmear"/> Papsmear <br/>
                        <input type="checkbox" name="option[]" value="HbsAg"/> HbsAg <br/>
                        <input type="checkbox" name="option[]" value="RPR/VDRL"/> RPR/VDRL <br/>
                        <input type="checkbox" name="option[]" value="Ultrasound (TVS/Pelvic)"/> Ultrasound (TVS/Pelvic) <br/>
                    </div>

                        {{--SECOND MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="second_month">
                            <h2>SECOND MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <br>
                            <input type="checkbox" name="option[]" value="Complete Blood Count"/> Complete Blood Count<br/>
                            <input type="checkbox" name="option[]" value="Blood Type and Rh Factor Urine Check"/> Blood Type and Rh Factor Urine Check <br/>
                            <input type="checkbox" name="option[]" value="Sugar (Check for diabetes, Oral Glucose Tolerance Test"/> Sugar (Check for diabetes, Oral Glucose Tolerance Test<br/>
                            <input type="checkbox" name="option[]" value="Protein (Check for kidney disease or toxemia)"/> Protein (Check for kidney disease or toxemia) <br/>
                            <input type="checkbox" name="option[]" value="Bacteria (Check for kidney or bladder infection"/> Bacteria (Check for kidney or bladder infection <br/>
                            <br>
                            <input type="checkbox" name="option[]" value="Ultrasound - Congenital Anomaly"/> Ultrasound - Congenital Anomaly <br/>
                            <input type="checkbox" name="option[]" value="Screening (for high risk patients)"/> Screening (for high risk patients)<br/>
                            <input type="checkbox" name="option[]" value="Pap Smear"/> Pap Smear <br/>
                            <input type="checkbox" name="option[]" value="Complete Physical Examination"/> Complete Physical Examination <br/>
                            <input type="checkbox" name="option[]" value="Pelvic Examination"/> Pelvic Examination <br/>
                        </div>

                        {{--THIRD MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="third_month">
                            <h2>THIRD MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Ultrasound Examination"/> Ultrasound Examination <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Doppler Check"/> Doppler Check <br/>
                            <input type="checkbox" name="option[]" value="Group B Streptococcus Screening - rectovaginal culture<"/> Group B Streptococcus Screening - rectovaginal culture<br/>
                        </div>

                        {{--FOURTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="fourth_month">
                            <h2>FOURTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Fetal Heart Tones"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="option[]" value="Blood tests"/> Blood tests <br/>
                        </div>

                        {{--FIFTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="fifth_month">
                            <h2>FIFTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Fetal Heart Tones"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="option[]" value="Abdomen felt for baby position and size"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="option[]" value="Blood tests"/> Blood tests <br/>
                        </div>

                        {{--SIXTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="sixth_month">
                            <h2>SIXTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Fetal Heart Tones"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="option[]" value="Abdomen felt for baby position and size"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="option[]" value="Blood tests"/> Blood tests <br/>
                        </div>

                        {{--SEVENTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="seventh_month">
                            <h2>SEVENTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Ultrasound"/> Ultrasound <br/>
                            <input type="checkbox" name="option[]" value="Fetal Heart Tones"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="option[]" value="Abdomen felt for baby position and size"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="option[]" value="Blood tests Rh, if Rh negative"/> Blood tests Rh, if Rh negative<br/>
                        </div>

                        {{--EIGHTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="eighth_month">
                            <h2>EIGHTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Ultrasound"/> Ultrasound <br/>
                            <input type="checkbox" name="option[]" value="Fetal Heart Tones"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="option[]" value="Abdomen felt for baby position and size"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="option[]" value="Blood tests"/> Blood tests<br/>
                        </div>

                        {{--NINTH MONTH CHECKLIST--}}
                        <div class="form-group label-floating is-empty" style="display: none" id="ninth_month">
                            <h2>NINTH MONTH: DOCTOR'S DATE</h2>
                            <p>OVERALL HEALTH</p>
                            <h3>Doctor's Checklist</h3>
                            <input type="checkbox" name="option[]" value="Blood Pressure Check"/> Blood Pressure Check <br/>
                            <input type="checkbox" name="option[]" value="Fundal Height Check"/> Fundal Height Check <br/>
                            <input type="checkbox" name="option[]" value="Ultrasound"/> Ultrasound <br/>
                            <input type="checkbox" name="option[]" value="Fetal Heart Tones"/> Fetal Heart Tones<br/>
                            <input type="checkbox" name="option[]" value="Abdomen felt for baby position and size"/> Abdomen felt for baby position and size<br/>
                            <input type="checkbox" name="option[]" value="Pelvic examination for changes in your cervix that indicate labor"/> Pelvic examination for changes in your cervix that indicate labor<br/>
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
            if ( this.value == 'First Month')
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
            if ( this.value == 'Second Month')
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
            if ( this.value == 'Third Month')
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
            if ( this.value == 'Fourth Month')
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
            if ( this.value == 'Fifth Month')
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
            if ( this.value == 'Sixth Month')
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
            if ( this.value == 'Seventh Month')
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
            if ( this.value == 'Eight Month')
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
            if ( this.value == 'Ninth Month')
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
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
            // if (hasChecked == false){
            //     alert("Please select at least one");
            //     return false;
            // }
            return true;
        }
    </script>
@endsection

