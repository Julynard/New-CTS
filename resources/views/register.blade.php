<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
    <title>CTS | Registration</title>
</head>
<body>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-4 mx-4">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        <div class="text-center mt-2">
            <img src="https://manila.pcu.edu.ph/wp-content/uploads/2018/05/cropped-pcu_logo_final_feb_2017-3.png" alt="pcu logo" width="80" height="auto">
            <h2 class="text-center" style="font-family: Old English Text MT; margin-bottom: -8px;">Philippine Christian University</h2>
            <small>Emilio Aguinaldo Hwy, Dasmariñas, 4114 Cavite</small>
            <h4>Health Safety Protocol <br> Contact Tracing Portal</h4>
        </div>
        {{-- <small class="text-danger"><b>Location: Main Gate</b></small>
        <input type="hidden" name="txtLocation" value="main_gate"> --}}
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="txtTypeOfUsr">Type of User:</label>
                <select name="txtTypeOfUsr" id="txtTypeOfUsr" class="form-control" onchange="showId(this.value)" required>
                    <option value="" selected>Please Select Type of User</option>
                    <option value="student">STUDENT</option>
                    <option value="employee">EMPLOYEE</option>
                </select>
            </div>
            <div class="form-group" style="display: none;" id="txtStudNum">
                <label for="txtStudNum">Student Number:</label>
                <input type="text" pattern="[0-9]{8,13}" title="Only numbers are allowed, atleast 8 digits and less than 13 digits!" id="studNum" name="txtStudNum" class="form-control" placeholder="Enter Student Number">
            </div>
            <div class="form-group" style="display: none;" id="txtEmpNum">
                <label for="txtEmpNum">Employee Number:</label>
                <input type="text" pattern="[0-9]{3,11}" title="Only numbers are allowed, atleast 3 digits and less than 12 digits!" id="empNum" name="txtEmpNum" class="form-control" placeholder="Enter Employee Number">
            </div>
            <div class="form-group">
                <label for="txtFname">First Name:</label>
                <input type="text" name="txtFname" id="txtFname"  pattern="[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]{1,20}" title="Only letters allowed, atleast 2 characters and less than 20 characters" class="form-control" placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for="txtMname">Middle Name:</label>
                <input type="text" name="txtMname" id="txtMname" pattern="[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]{1,20}" title="Only letters allowed, atleast 2 characters and less than 20 characters" class="form-control" placeholder="Enter Middle Name">
            </div>
            <div class="form-group">
                <label for="txtLname">Last Name:</label>
                <input type="text" name="txtLname" id="txtLname" pattern="[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]{1,20}" title="Only letters allowed, atleast 2 characters and less than 20 characters"  class="form-control" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group">
                <label for="txtXname">Extension Name:</label>
                <select name="txtXname" id="txtXname" class="form-control">
                    <option value="" selected>Please Select Extention Name...</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="Jr.">Jr.</option>
                    <option value="Sr.">Sr.</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VII">VII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtGender">Gender:</label>
                <select name="txtGender"  id="txtGender" class="form-control" required>
                    <option value="" selected>Please Select Gender</option>
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtDob">Date of Birth:</label>
                <input type="date" name="txtDob" id="txtDob" class="form-control" min="1940-01-01" max="2002-01-01" required>
            </div>
            <div class="form-group">
                <label for="province">Province:</label>
                <select name="province" id="province" class="form-control input-lg dynamic" data-dependent="city" required>
                    <option value="" selected>Please Select Province</option>
                        @foreach($province_list as $province)
                            <option value="{{ $province->province}}">{{ $province->province }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control input-lg dynamic" data-dependent="barangay" required>
                    <option value="" selected>Please Select City</option>
                </select>
            </div>
            <div class="form-group">
                <label for="barangay">Barangay:</label>
                <select name="barangay" id="barangay" class="form-control input-lg" required>
                    <option value="" selected>Please Select Barangay</option>
                </select>
            </div>
            <div class="form-group">
                <label for="FrBrgyCovid">From barangay with known positive Covid patient?:</label>
                <select name="FrBrgyCovid" id="FrBrgyCovid" class="form-control input-lg" required>
                    <option value="" selected>Please Select Value</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tempUponEntry">Temperature upon point of entry:</label>
                <input type="text" pattern="[0-9]{2,2}" title="Only numbers are allowed, minimum of 2 digits!" name="tempUponEntry" class="form-control" placeholder="Enter Temperature" required>
            </div>
            <div class="form-group">
                <label for="sanitizeUponEntry">Hand Sanitation at point of entry?:</label>
                <select name="sanitizeUponEntry" id="sanitizeUponEntry" class="form-control input-lg" required>
                    <option value="" selected>Please Select Value</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>
            <hr>
            <emp><b>Please check if you have the following:</b></emp><br>
            <div class="form-check-inline mt-2">
                <label class="form-check-label" for="cough">
                  <input type="checkbox" class="form-check-input" id="cough" name="cough" value="cough">Cough
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="colds">
                  <input type="checkbox" class="form-check-input" id="colds" name="colds" value="colds">Colds
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="fever">
                  <input type="checkbox" class="form-check-input" id="fever" name="fever" value="fever">Fever
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="soreThroat">
                  <input type="checkbox" class="form-check-input" id="soreThroat" name="soreThroat" value="soreThroat">Sore Throat
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="diffOfbreath">
                  <input type="checkbox" class="form-check-input" id="diffOfbreath" name="diffOfbreath" value="diffOfbreath">Difficulty of breathing
                </label>
            </div>
            <hr>
            <div class="form-group">
                <label for="travelHistory">History of travel nearby town/outside the country?:</label>
                <select name="travelHistory" id="travelHistory" class="form-control input-lg" onchange="travelhistory(this.value)" required>
                    <option value="" selected>Please Select Value</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>
            <div class="form-group" style="display: none;" id="txtDate">
                <label for="txtDate">Date:</label>
                <input type="date" name="txtDate" class="form-control">
            </div>
            <div class="form-group" style="display: none;" id="txtPlace">
                <label for="txtPlace">Place:</label>
                <input type="text" name="txtPlace" pattern="[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]{1,20}" title="Only letters allowed, atleast 2 characters and less than 20 characters" class="form-control" placeholder="Enter The Address">
            </div>
            <div class="form-group mt-2">
                <label for="contactToPatient">History of Close Contact with known Covid patient?:</label>
                <select name="contactToPatient" id="contactToPatient" class="form-control input-lg" required>
                    <option value="" selected>Please Select Value</option>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtEmail">Email:</label>
                <input type="email" name="txtEmail" id="txtEmail" pattern="[a-z0-9._%+-]+@pcu.edu.ph" title='Must have this "@pcu.edu.ph", atleast 13 characters and less than 50 characters' class="form-control" placeholder="Enter PCU Email Address" required>
            </div>
            <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </form>
    </div>
</body>
{{-- Importing of jquery. --}}
<script src="{{ asset('js/jquery.js') }}"></script>
{{-- For Address --}}
<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                const select = $(this).attr("id");
                const value = $(this).val();
                const dependent = $(this).data('dependent');
                const _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('student.fetch') }}",
                    method: "POST",
                    data: {select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }
                });
            }
        });

        $('#province').change(function(){
            $('#city').val('');
            $('#barangay').val('');
        });

        $('#city').change(function(){
            $('#barangay').val('');
        });

    });
</script>
{{-- Validation of birth date. --}}
<script>
    function myFunction() {
        const dateValidation = document.getElementById("txtDob").min
    }
</script>
{{-- Hide/Show Student/Employee Number --}}
<script>
    function showId(val) {
        const typeOfUsr  = document.querySelector('#txtTypeOfUsr')
        const studNum    = document.querySelector('#txtStudNum')
        const txtStudNum = document.querySelector('#studNum')
        const empNum     = document.querySelector('#txtEmpNum')
        const txtEmpNum  = document.querySelector('#empNum')

        if(typeOfUsr.value==='student') {
            empNum.style.display="none"
            studNum.style.display="block"
            txtStudNum.required = true;
        } else if (typeOfUsr.value==='employee') {
            studNum.style.display="none"
            empNum.style.display="block"
            txtEmpNum.required = true;
        } else {
            alert('Please select type of user!')
            studNum.style.display="none"
            empNum.style.display="none"
        }
    }
</script>
{{-- Hide/Show Travel History --}}
<script>
    function travelhistory(val) {
        const travelHistory = document.querySelector('#travelHistory');
        const date = document.querySelector('#txtDate');
        const place = document.querySelector('#txtPlace');

        if(travelHistory.value=='Y') {
            date.style.display="block"
            place.style.display="block"
        } else if(travelHistory.value=='N') {
            date.style.display="none"
            place.style.display="none"
        } else {
            date.style.display="none"
            place.style.display="none"
            alert('Please select value')
        }
    }
</script>
{{-- Auto Close Alert Message --}}
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
</script>
</html>