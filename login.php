<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="student/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="student/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="student/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="student/css/util.css">
    <link rel="stylesheet" type="text/css" href="student/css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100"><span style="text-align:center;font-size:50px;font-weight:500;" class="login100-form-title p-b-32">
                      Teacher  Account Login
                    </span>
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55"> 
                <form method="post" id="teacher_login_form" class="login100-form validate-form flex-sb flex-w">


                    <span class="txt1 p-b-11">
                        Username
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" >
                        <input class="input100" type="text" name="teacher_emailid" id="teacher_emailid" >
                        <span id="error_teacher_emailid"  class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
                        Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100"  type="password" name="teacher_password" id="teacher_password" >
                        <span  id="error_teacher_password" class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-48">
                        
                        <div>
                            <a href="#" class="txt3">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <input  type="submit" name="teacher_login" id="teacher_login" class="login100-form-btn" value="Login"/>

                        
                    </div>

                </form>
            </div>
        </div>
    </div>
      <script>
$(document).ready(function(){
    $('#teacher_login_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"check_teacher_login.php",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#teacher_login').val('Validate...');
                $('#teacher_login').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.success)
                {
                    location.href="index.php";
                }
                if(data.error)
                {
                    $('#teacher_login').val('Login');
                    $('#teacher_login').attr('disabled', false);
                    if(data.error_teacher_emailid != '')
                    {
                        $('#error_teacher_emailid').text(data.error_teacher_emailid);
                    }
                    else
                    {
                        $('#error_teacher_emailid').text('');
                    }
                    if(data.error_teacher_password != '')
                    {
                        $('#error_teacher_password').text(data.error_teacher_password);
                    }
                    else
                    {
                        $('#error_teacher_password').text('');
                    }
                }
            }
        })
    });
});
</script>

   
<!--===============================================================================================-->
    <script src="student/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
   
<!--===============================================================================================-->
    

</body>
</html>