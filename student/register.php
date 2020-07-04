<?php session_start();

    require_once ("../config.php");

     if(isset($_SESSION['std_login'])){

        header("Location: index.php");
    }



    if(isset($_POST['student_register'])){

       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $roll = $_POST['roll'];
       $reg = $_POST['reg'];
       $email = $_POST['email'];
       $username = $_POST['username'];
       $password = $_POST['password'];
       $repass = $_POST['repass'];
       $phone = $_POST['phone'];

       $image = explode('.', $_FILES['image']['name']);
       $image_ext = end($image);
       $image = date('Ymdhis.').$image_ext;



        $input_error = array();

        if(empty($fname)){
            $input_error['fname'] = "First name is required!";
        }

        if(empty($lname)){
            $input_error['lname'] = "Last name is required!";
        }

        if(empty($username)){
            $input_error['username'] = "username name is required!";
        }

        if(empty($email)){
            $input_error['email'] = "Eamil is required!";
        }

        if(empty($roll)){
            $input_error['roll'] = "Roll is required!";
        }

        if(empty($reg)){
            $input_error['reg'] = "Reg. No is required!";
        }

        if(empty($phone)){
            $input_error['phone'] = "phone is required!";
        }

        if(empty($password)){
            $input_error['password'] = "password is required!";
        }

        if(empty($repass)){
           $input_error['repass'] = "confirm password is required!";
       }

         if(count($input_error) == 0){


            $email_check = "SELECT * FROM students WHERE  email = '$email'";

            $check = mysqli_query($con, $email_check);

            $row_check  = mysqli_num_rows($check);

            if($row_check  == 0){
            
                  $user_check = "SELECT * FROM students WHERE  username = '$username'";
                  $check_u = mysqli_query($con, $user_check);
                  $row_check_user  = mysqli_num_rows($check_u);

                  if($row_check_user == 0){
                    
                    if(strlen($username) > 6 ){

                        if(strlen($password) > 7){

                            if( $password == $repass){

                                $roll_check = "SELECT * FROM students WHERE  roll = '$roll'";
                                $check_r = mysqli_query($con, $roll_check);
                                $row_check_roll  = mysqli_num_rows($check_r);

                                if( $row_check_roll == 0){

                                     $reg_check = "SELECT * FROM students WHERE  reg = '$reg'";
                                     $check_reg = mysqli_query($con, $reg_check);
                                     $row_check_reg  = mysqli_num_rows($check_reg);

                                     if($row_check_reg  == 0){

                                         
                                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                                             $insert ="INSERT INTO students(fname,lname,roll,reg,email,username,password,status,phone,image)VALUES('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone','$image')";

                                             $result = mysqli_query($con,$insert);

                                       
                                        if($result){
                                            move_uploaded_file($_FILES['image']['tmp_name'], '../images/students/'.$image);
                                            $success = "Registration Successfully";
                                        }else{
                                            $error = "Registration faield";
                                        }

                                     }else{
                                        $reg_exists ="This Reg. No already exists";
                                     }

                                }else{
                                     $roll_exists ="This Roll already exists";
                                }


                            }else{
                                $repass_esists = "Confirm-password did'n match!";
                            }

                        }else{
                             $password_exists ="password more than 8 charcter";
                        }

                    }else{
                        $user_exists ="username more than 7 charcter";
                    }


                  }else{
                    $user_exists ="This username already exists";
                  }


            }else{
                $email_exists ="This email already exists";
            }

         }

      
    }
    
?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">{LMS}</h1>

            <?php 
                if(isset($success)){
                    ?>
                     <div class="alert alert-success" role="alert">
                            <?= $success ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
            ?>

           <?php 
                if(isset($error)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>


           <?php 
                if(isset($email_exists)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $email_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

             <?php 
                if(isset($user_exists)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $user_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

            <?php 
                if(isset($password_exists)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $password_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

             <?php 
                if(isset($repass_esists)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $repass_esists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

           <?php 
                if(isset($roll_exists)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $roll_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

            <?php 
                if(isset($reg_exists)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $reg_exists ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="First Nmae" value="<?= isset($fname) ? $fname:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                             <?php 
                                   if(isset($input_error['fname'])){
                                      echo '<span class="input_error">'. $input_error['fname'] .'</span>';
                                       }
                              ?>

                           
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" value="<?= isset($lname) ? $lname:''?>" placeholder="Last Nmae">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php 
                                if(isset($input_error['lname'])){
                                    echo '<span class="input_error">'. $input_error['lname'] .'</span>';
                                }
                            ?>
                          
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" value="<?= isset($email) ? $email:''?>"  name="email" placeholder="Email">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php 
                                if(isset($input_error['email'])){
                                    echo '<span class="input_error">'. $input_error['email'] .'</span>';
                                }
                            ?>

                            
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" value="<?= isset($username) ? $username:''?>" name="username" placeholder="username">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php 
                                if(isset($input_error['username'])){
                                    echo '<span class="input_error">'. $input_error['username'] .'</span>';
                                }
                            ?>
                           
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control"  name="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php 
                                if(isset($input_error['password'])){
                                    echo '<span class="input_error">'. $input_error['password'] .'</span>';
                                }
                            ?>
                           
                        </div>

                         <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control"  name="repass" placeholder="confirm password">
                                <i class="fa fa-key"></i>
                            </span>
                            
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" value="<?= isset($roll) ? $roll:''?>" name="roll" placeholder="roll">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php 
                                if(isset($input_error['roll'])){
                                    echo '<span class="input_error">'. $input_error['roll'] .'</span>';
                                }
                            ?>
                            
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" value="<?= isset($reg) ? $reg:''?>" name="reg" placeholder="Reg. No">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php 
                                if(isset($input_error['reg'])){
                                    echo '<span class="input_error">'. $input_error['reg'] .'</span>';
                                }
                            ?>
                            
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" value="<?= isset($phone) ? $phone:''?>" name="phone" placeholder="01*******">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php 
                                if(isset($input_error['phone'])){
                                    echo '<span class="input_error">'. $input_error['phone'] .'</span>';
                                }
                            ?>
                            
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="file" name="image" onchange="readURL(this);" />
                                <i class="fa fa-image"></i>
                            </span>
                            <img id="blah" width="60" src="../images/students/avatar.png" alt="avatar">
                        </div>

                        <script type="text/javascript">
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#blah').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>




                        <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
