<?php

//login.php

include('database_connection.php');

session_start();

if(isset($_SESSION["admin_id"]))
{
        header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin || Student Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->

<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">                                                              
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form  method="post" id="admin_login_form" class="login100-form validate-form">
                    <span class="login100-form-title p-b-49">
                       Admin	Login
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" >
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="admin_user_name" id="admin_user_name"  placeholder="Type your username">
                        <span id="error_admin_user_name"   class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input"  >
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="admin_password" id="admin_password"  placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>


                          <br>
                          <br>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" name="admin_login" id="admin_login" class="login100-form-btn"  value="Admin Login">
                           Admin Login </button>
                        </div>
                    </div>



                                    </form>
            </div>                        
    </div>


<script>
$(document).ready(function(){
    $('#admin_login_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"check_admin_login.php",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#admin_login').val('Validate...');
                $('#admin_login').attr('disabled', 'disabled');
            },
            success:function(data)
            {
                if(data.success)
                {
                    location.href = "<?php echo $base_url; ?>admin";
                }
                if(data.error)
                {
                    $('#admin_login').val('Login');
                    $('#admin_login').attr('disabled', false);
                    if(data.error_admin_user_name != '')
                    {
                        $('#error_admin_user_name').text(data.error_admin_user_name);
                    }
                    else
                    {
                        $('#error_admin_user_name').text('');
                    }
                    if(data.error_admin_password != '')
                    {
                        $('#error_admin_password').text(data.error_admin_password);
                    }
                    else
                    {
                        $('#error_admin_password').text('');
                    }
                }
            }
        });
    });
});
</script>

<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>