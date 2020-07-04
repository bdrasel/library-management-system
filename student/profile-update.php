
<?php require_once('header.php');

    $login_data = $_SESSION['std_id'];
    $result = mysqli_query($con, "SELECT * FROM `students` WHERE id=' $login_data'");
    $result_stu = mysqli_fetch_assoc($result);


    if(isset($_POST['update_student'])){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $phone = $_POST['phone']; 

        $image_name = explode('.', $_FILES['image']['name']);
        $image_ext = end($image_name);
        $image_name = date('Ymdhis.').$image_ext;
        
        $update ="UPDATE students SET email='$email', phone='$phone', image='$image_name' WHERE id='$id'";
        $update_result = mysqli_query($con, $update);

        if($update_result){
           move_uploaded_file($_FILES['image']['tmp_name'],'../images/students/'.$image_name);
            $success = "Student Update Successfully!";
            ?>

            <script>
                javascript:history.go(-1);
            </script>
           
           <?php
        }else{
            $error ="Student Update failed!";
        }
    }


?>


<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><i class="fa fa-update" aria-hidden="true"></i><a href="javascript:avoid(0)">Update Profile</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
<div class="col-sm-6 col-sm-offset-3">

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

    <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-md-12">
                
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <h5 class="mb-lg text-center text-bold pb-2">Update Student Profile</h5>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-4 control-label">Student Id</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly name="id" value="<?= $result_stu['id'];?>">
                            </div>
                        </div>                              
                        <div class="form-group">
                            <label for="" class="col-sm-4 control-label">Student Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly  name="" value="<?= $result_stu['fname']. ' '.$result_stu['lname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 control-label">Roll</label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control" readonly name="" value="<?= $result_stu['roll'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 control-label">Reg. No</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" readonly name="" value="<?= $result_stu['reg'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_price" class="col-sm-4 control-label">Student Image</label>
                            <div class="col-sm-8">
                                <input type="file" name="image" />
                                <?php 
                                       if($result_stu['image']){ ?>

                                        <img width="60" src="../images/students/<?= $result_stu['image'];?>" alt="student">

                                    <?php }else{ ?>

                                        <img width="60" src="../images/students/avatar.png" alt="avatar">
                                        
                                    <?php  } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_qty" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="<?= $result_stu['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="available_qty" class="col-sm-4 control-label">Contact Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" value="<?= $result_stu['phone'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" name="update_student" class="btn btn-primary"><i class="fa fa-save"></i> UPDATE</a></button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
             
</div>
<!-- RIGHT SIDEBAR -->
<?php


 require_once('footer.php');
 ?>       