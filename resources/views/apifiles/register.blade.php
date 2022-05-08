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
        <h3 class="text-center text-success">Test API Platform</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <form action="#" method="POST" id="registerform">
                    <div class="alert alert-dismissible d-none" id="alertdiv">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    @csrf
                    <div class="form-group mb-2">
                        <label for=""><b>First Name</b></label>
                        <input type="text" name="firstname" placeholder="Enter your First Name" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-2">
                        <label for=""><b>Last Name</b></label>
                        <input type="text" name="lastname" placeholder="Enter your Last Name" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-2">
                        <label for=""><b>Phone Number</b></label>
                        <input type="phone" name="phone" placeholder="Enter Phone Number" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
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
                        <input id="regbtn" type="submit" value="REGISTER " class="form-control btn btn-danger">
                    </div>
                </form>
            </div>
            <p class="text-center">Already have an account? <a href="/loginuser">LOG IN</a></p>
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
                //console.log(res);
                $('#regbtn').val('REGISTER');
                if (res.status == 400) {
                    $('#alertdiv').text('Some errors in registering');
                    $('#alertdiv').removeClass('d-none');
                    $('#alertdiv').addClass('alert-danger');

                // showError('booknumber', res.messages.booknumber);
                // showError('category', res.messages.category);
                // showError('class', res.messages.class);
                // showError('subject', res.messages.subject);
                // showError('publisher', res.messages.publisher);
                } else if(res.status == 200){
                $('#registerform')[0].reset();
                $('#alertdiv').text(res.messages);
                $('#alertdiv').removeClass('d-none');
                $('#alertdiv').addClass('alert-success');
                // $('#bookregbtn').val('ADD BOOK');
                // $('#booksregres').removeClass('d-none');
                // $('#booksregres').text(res.messages);
                // $('#booksmodal').modal('hide');
                // fetchbooks();   
                }
            }
         })
        })
 
    })
</script>
</body>
</html>