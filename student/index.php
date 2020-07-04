    <?php require_once('header.php');?>

                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Issue Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $student_id = $_SESSION['std_id'];

                                           $query = "SELECT `issue_books` . `book_issue_date`, `books`.`book_name`,`books`.`book_image`
FROM `books`
INNER JOIN `issue_books` ON `issue_books`.`book_id`=`books`.`id`
WHERE `issue_books`.`student_id` ='$student_id'";
                                           $result = mysqli_query($con,$query);
                                          
                                           while ($row = mysqli_fetch_assoc($result)) { ?>

                                            <tr>
                                                <td><?= $row['book_name'];?></td>
                                                <td>
                                                    <img width="50px" src="../images/books/<?= $row['book_image']?>" alt="">
                                                </td>
                                                <td><?= date('d-M-Y', strtotime($row['book_issue_date']));?></td>
                                               
                                            </tr>

                                            <?php
                                              
                                           }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                     
                </div>
            <!-- RIGHT SIDEBAR -->
    <?php require_once('footer.php');?>       