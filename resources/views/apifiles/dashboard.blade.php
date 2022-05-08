<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://munyaoapi.herokuapp.com/css/style.css" rel="stylesheet">
    <link href="https://munyaoapi.herokuapp.com/css/fontcss/all.min.css" rel="stylesheet">
    <link href="https://munyaoapi.herokuapp.com/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontcss/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3 class="text-center text-success">DashBoard Page</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <p>First Name : <b class="text-danger"> {{ request()->session()->get('LoggedInUser.fname') }} </b> </p>
                <p>Last Name : <b class="text-danger"> {{ request()->session()->get('LoggedInUser.lname') }} </b> </p>
                <p>Phone : <b class="text-danger"> {{ request()->session()->get('LoggedInUser.phone') }} </b> </p>
                <p>Email : <b class="text-danger"> {{ request()->session()->get('LoggedInUser.email') }} </b> </p>
            </div>
        </div>
    </div>
  
<script src="https://munyaoapi.herokuapp.com/js/bootstrap.bundle.min.js"></script>
<script src="https://munyaoapi.herokuapp.com/js/jquery.min.js"></script> 
<script src="https://munyaoapi.herokuapp.com/js/functions.js"></script> 
<script src="https://munyaoapi.herokuapp.com/js/fontjs/all.min.js"></script>   
<!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/fontjs/all.min.js') }}"></script> -->
<script>
    $(document).ready(function(){
       //Register Books
     $('#registerform').submit(function(e){
         $('#regbtn').val('PLEASE WAIT...');
         e.preventDefault();
         var formdata = new FormData($(this)[0]);
         $.ajax({
             method: 'POST',
             url: '/registeruser',
             contentType: false,
            processData: false,
            //dataType: 'json',
            data: formdata,
            success: function(res) {
                console.log(res);
                
            }
         })
        })
 
    })
</script>
</body>
</html>