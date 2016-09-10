<?php 
$username = isset($username)&&!empty($username)?$username:"";
$password = isset($password)&&!empty($password)?$password:"";
$mail = isset($mail)&&!empty($mail)?$mail:"";
$confirmPassword= isset($confirmPassword)&&!empty($confirmPassword)?$confirmPassword:"";
$usernameErrors = $passwordErrors = $mailErrors = $confirmPasswordErrors = array();
if (isset($errors) && !empty($errors)){
    $usernameErrors = isset($errors["username"])&&!empty($errors["username"])?$errors["username"]:array();
    $passwordErrors = isset($errors["password"])&&!empty($errors["password"])?$errors["password"]:array();
    $mailErrors= isset($errors["mail"])&&!empty($errors["mail"])?$errors["mail"]:array();
    $confirmPasswordErrors= isset($errors["confirmPassword"])&&!empty($errors["confirmPassword"])?$errors["confirmPassword"]:array();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" />
    <meta charset="utf-8" />
    <title>Sign Up | <?php echo SITENAME?></title>

    <?php 
    $this->load->view('shared/css');
    ?>
    <style>
        .inputError {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row page">
            <?php
            $this->load->view('shared/header');
            ?>
            <form class="form form-inline" method="post" action="<?php echo site_url("userregister") ?>" id="myform">
                <div class="row formElement">

                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label class="form-label">User Name</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" required="required" value="<?php echo $username?>" class="form-control" name="username" id="username" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="inputError">
                            <?php 
                            foreach($usernameErrors as $usernameError){
                                echo "<h6>{$usernameError}</h6>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <hr />
                <div class="row formElement">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" required="required" value="<?php echo $mail?>" class="form-control" name="mail" id="mail" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="inputError">
                            <?php 
                            foreach($mailErrors as $mailError){
                                echo "<h6>{$mailError}</h6>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <hr />
                <div class="row formElement">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                        </div>
                        <div class="col-md-6">
                            <input type="password" required="required" value="<?php echo $password?>"  class="form-control" name="password" id="password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="inputError">
                            <?php 
                            foreach($passwordErrors as $passwordError){
                                echo "<h6>{$passwordError}</h6>";
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="row formElement">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                        </div>
                        <div class="col-md-6">
                            <input type="password" required="required" value="<?php echo $confirmPassword?>"  class="form-control" name="confirmPassword" id="confirmPassword" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="inputError">
                            <?php 
                            foreach($confirmPasswordErrors as $confirmPasswordError){
                                echo "<h6>{$confirmPasswordError}</h6>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <hr />
                <div class="row formElement">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <input type="submit" value="Register" class="btn btn-default" />
                        </div>
                    </div>
                </div>

            </form>

        </div>


    </div>
    <?php 

    $this->load->view('shared/scripts');
    ?>
    <script>
        $(document).ready(function () {
            function containsSpecialChars(string) {

                var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";
                for (i = 0; i < specialChars.length; i++) {
                    if (string.indexOf(specialChars[i]) > -1) {
                        return true;
                    }
                }
            }
            $("#myform").submit(function (e) {
                username = $("#username").val();
                if (containsSpecialChars(username)) {
                    $("#username").parent().parent().parent().find(".inputError").html("User Name Not Valid");
                    e.preventDefault();
                }
                if (containsSpecialChars($("#password").val())) {
                    $("#password").parent().parent().parent().find(".inputError").html("Password contains special characters");
                    e.preventDefault();
                }
                if ($("#password").val() != $("#confirmPassword").val()) {
                    $("#confirmPassword").parent().parent().parent().find(".inputError").html("Passwords aren't match");
                    e.preventDefault();
                }

            });

            $("#myform input").change(function () {
                $(this).parents(".formElement").find(".inputError").html("");
            });
            $("#myform input").keydown(function () {
                $(this).parents(".formElement").find(".inputError").html("");
            });
        });
    </script>
</body>
</html>
