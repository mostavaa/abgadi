<?php 
$username = isset($username)&&!empty($username)?$username:"";
$password = isset($password)&&!empty($password)?$password:"";
$usernameErrors = $passwordErrors = array();
if (isset($errors) && !empty($errors)){
    $usernameErrors = isset($errors["username"])&&!empty($errors["username"])?$errors["username"]:array();
    $passwordErrors = isset($errors["password"])&&!empty($errors["password"])?$errors["password"]:array();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" />
    <meta charset="utf-8" />
    <title>Login | <?php echo SITENAME?></title>

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
    <?php 
    $this->load->view('shared/sidebar');
    ?>

    <div class="container">
        <div class="row page">
            <?php
            $this->load->view('shared/header');
            ?>
            <div class="content">

                <div class="">
                    <form class="form form-inline" method="post" action="<?php echo site_url("usercontroller/login") ?>" id="myform">
                        <div class="row formElement">
                            <div class="col-md-6">
                                <p class="inputError">
                                    <?php 
                                    foreach($usernameErrors as $usernameError){
                                        echo "<h6>{$usernameError}</h6>";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <input type="text" required="required" value="<?php echo $username?>" class="form-control" name="username" id="username" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">اسم المستخدم</label>
                                </div>

                            </div>

                        </div>
                        <hr />

                        <div class="row formElement">
                            <div class="col-md-6">
                                <p class="inputError">
                                    <?php 
                                    foreach($passwordErrors as $passwordError){
                                        echo "<h6>{$passwordError}</h6>";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <input type="password" required="required" value="<?php echo $password?>"  class="form-control" name="password" id="password" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">الرقم السري</label>
                                </div>

                            </div>

                        </div>


                        <hr />
                        <div class="row formElement">
                            <div class="col-md-3 col-md-offset-6">
                                <div class="col-md-6">
                                    <input type="submit" value="تسجيل الدخول" class="btn btn-default" />
                                </div>
                            </div>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>

    <?php
    //$this->load->view('shared/footer');
    ?>
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
