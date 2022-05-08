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
        <h3 class="text-center text-success">LOGIN PAGE</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <form action="#" method="POST" id="loginform">
                    <div class="alert alert-dismissible d-none" id="alertdiv">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    @csrf
                    <div class="form-group mb-2">
                        <label for=""><b>Email</b></label>
                        <input type="email" name="email" placeholder="Enter your Email" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-2">
                        <label for=""><b>Password</b></label>
                        <input type="password" name="password" placeholder="Enter your Password" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-2">
                        <input id="regbtn" type="submit" value="LOGIN" class="form-control btn btn-danger">
                    </div>
                </form>
            </div>
            <p class="text-center">Do not have an account? <a href="/">Register</a></p>
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
     $('#loginform').submit(function(e){
         $('#regbtn').val('PLEASE WAIT...');
         e.preventDefault();
         var formdata = new FormData($(this)[0]);
         $.ajax({
             method: 'POST',
             url: '/loginwebuser',
             contentType: false,
            processData: false,
            //dataType: 'json',
            data: formdata,
            success: function(res) {
                console.log(res);
                if (res.status == 200) {
                    window.location = '/dashboard';
                } else if(res.status == 401){
                //$('#registerform')[0].reset();
                $('#alertdiv').text(res.messages);
                $('#alertdiv').removeClass('d-none');
                $('#alertdiv').addClass('alert-success');  
                }
            }
         })
        })
 
    })
</script>
</body>
</html>