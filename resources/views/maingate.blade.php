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
    <title>CTS | Portal</title>
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
        <small class="text-danger"><b>Location: Main Gate</b></small>
        <form action="{{ route('maingate') }}" method="post">
            @csrf
            <input type="hidden" name="txtLocation" value="main_gate">
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
                <input type="text" pattern="[0-9]{8,13}" title="Only numbers are allowed, atleast 8 digits and less than 13 digits!" name="txtStudNum" class="form-control" placeholder="Enter Student Number">
            </div>
            <div class="form-group" style="display: none;" id="txtEmpNum">
                <label for="txtEmpNum">Employee Number:</label>
                <input type="text" pattern="[a-zA-Z0-9_-]{3,11}" title="Only numbers, letters and - are allowed, atleast 3 digits and less than 12 digits!" name="txtEmpNum" class="form-control" placeholder="Enter Employee Number">
            </div>
            <div class="form-group" style="display: none;" id="temp">
                <label for="txtTemp">Enter Your Temperature:</label>
                <input type="text" pattern="[0-9]{2,2}" title="Only numbers are allowed, atleast 2 digits and less than 2 digits!" name="txtTemp" id="txtTemp" class="form-control" placeholder="Enter Temperature" required>
            </div>
            <input type="submit" value="Submit" onclick="return validate()" style="display: none;" id="btnSave" class="btn btn-primary">
        </form>
    </div>
</body>
{{-- Hide/Show Student/Employee Number --}}
<script>
    function showId(val) {
        const typeOfUsr = document.querySelector('#txtTypeOfUsr')
        const studNum   = document.querySelector('#txtStudNum')
        const empNum    = document.querySelector('#txtEmpNum')
        const temp      = document.querySelector('#temp')
        const save      = document.querySelector('#btnSave')

        if(typeOfUsr.value==='student') {
            empNum.style.display="none"
            temp.style.display="block"
            save.style.display="block"
            studNum.style.display="block"
        } else if (typeOfUsr.value==='employee') {
            studNum.style.display="none"
            temp.style.display="block"
            save.style.display="block"
            empNum.style.display="block"
        } else {
            alert('Please select type of user!')
            studNum.style.display="none"
            empNum.style.display="none"
            temp.style.display="none"
            save.style.display="none"
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
{{-- Temperature Validation --}}
<script>
    function validate(){
        const txtTemp = document.querySelector('#txtTemp');

        if(txtTemp.value >= 37) {
            alert('You are note allowed to enter these building, because your temperature is too high than the nomral temperature!')
            window.history.back();
            location.reload();
            return false;
        } else if(txtTemp.value <= 33){
            alert('Your temperature is too low, please input a valid temperature!')
            window.history.back();
            location.reload();
            return false;
        }
    }
</script>
</html>