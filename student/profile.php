<?php session_start();
   require_once('header.php');

    $login_data = $_SESSION['std_id'];
    $result = mysqli_query($con, "SELECT * FROM students WHERE id='$login_data'");
    $result_stu = mysqli_fetch_assoc($result);


?>


<style>
    table{
        width:570px;
    }
    table tr td{
        padding:10px;
        font-size:17px;
    }
</style>

<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><i class="fa fa-profile" aria-hidden="true"></i><a href="javascript:avoid(0)">Profile</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">
    <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-md-12">
                        <h5 class="mb-lg text-center text-bold pb-2">Student Profile</h5>

                            <table class=" table-bordered">
                                <tr>
                                    <td>Student Id</td>
                                    <td><?= $result_stu['id'];?></td>
                                </tr>

                                <tr>
                                    <td>Student Name</td>
                                    <td><?= $result_stu['fname']. ' '.$result_stu['lname']; ?></td>
                                </tr>

                                <tr>
                                    <td> Roll</td>
                                    <td><?= $result_stu['roll'] ?></td>
                                </tr>

                                <tr>
                                    <td> Reg. No</td>
                                    <td><?= $result_stu['reg'];?></td>
                                </tr>

                                <tr>
                                    <td>Student Image</td>
                                    <td>
                                       <?php 
                                            if($result_stu['image']){ ?>

                                                <img width="60" src="../images/students/<?= $result_stu['image'];?>" alt="student">

                                            <?php }else{ ?>

                                                <img width="60" src="../images/students/avatar.png" alt="avatar">
                                                
                                             <?php  } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Student Email</td>
                                    <td><?= $result_stu['email'];?></td>
                                </tr>

                                <tr>
                                    <td>Contact Number</td>
                                    <td><?= $result_stu['phone'];?></td>
                                </tr>
                            
                            </table>
                         <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <a href="profile-update.php"  class="btn btn-primary"><i class="fa fa-save"></i> UPDATE</a> 
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>
   

<!-- RIGHT SIDEBAR -->
<?php require_once('footer.php');?>       