    <?php require_once('header.php');?>

                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
               <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                         <th>Author Name</th>
                                        <th>Publication Name</th>
                                        <th>Purchase Date</th>
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        <th>Available Quantity</th>
                                        <th>Action</th>
                                      
                                       
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $result = "SELECT * FROM books";
                                            $query = mysqli_query($con, $result);

                                            while($row = mysqli_fetch_assoc($query)){

                                        ?>

                                        <tr>
                                            <td><?=$row['book_name'];?></td>
                                            <td><img width="60" src="../images/books/<?=$row['book_image'];?>" alt=""></td>
                                            <td><?=$row['book_author_name'];?></td>
                                           
                                            <td><?=$row['book_publication_name'];?></td>
                                             <td><?= date('d-M-Y' ,strtotime($row['book_purchase_date']));?></td>
                                            <td><?=$row['book_price'];?></td>
                                            <td><?=$row['book_qty'];?></td>
                                            <td><?=$row['available_qty'];?></td>
                                          
                                            <td>
                                                <a class="btn btn-info" href="javascript:avoid(0)" data-toggle="modal" data-target="#book-<?= $row['id'];?>"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#book-update-<?= $row['id'];?>"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete information')" href="delete.php?bookdelete=<?= base64_encode($row['id'])?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                           
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

       <?php 
            $result = "SELECT * FROM books";
            $query = mysqli_query($con, $result);

            while($row = mysqli_fetch_assoc($query)){

        ?>      

    <div class="modal fade" id="book-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
                </div>
                <div class="modal-body">
                   <table class="table table-bordered">
                       <tr>
                            <th>Book Name</th>
                            <td><?=$row['book_name'];?></td>
                       </tr>
                       <tr>
                            
                          <th>Book Image</th>
                            <td><img width="60" src="../images/books/<?=$row['book_image'];?>" alt=""></td>
                       </tr>
                        <tr>
                            
                           <th>Author Name</th>
                           <td><?=$row['book_author_name'];?></td>
                       </tr>
                        <tr>  
                           <th>Publication Name</th>
                            <td><?=$row['book_publication_name'];?></td>
                           
                       </tr>
                        <tr>  
                           <th>Purchase Date</th>
                           <td><?= date('d-M-Y' , strtotime($row['book_purchase_date']));?></td>
                       </tr>
                        <tr>  
                           <th>Book Price</th>
                            <td><?=$row['book_price'];?></td>
                       </tr>
                        <tr>  
                           <th>Book Quantity</th>
                            <td><?=$row['book_qty'];?></td>
                       </tr>
                        <tr>  
                           <th>Available Quantity</th>
                           <td><?=$row['available_qty'];?></td>
                       </tr>             
                                       
                   </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

     <?php 
        }
      ?>




 <?php 
            $result = "SELECT * FROM books";
            $query = mysqli_query($con, $result);

            while($row = mysqli_fetch_assoc($query)){


            $id = $row['id'];
            $book_info = "SELECT * FROM books WHERE id = '$id'";
            $book_info_query = mysqli_query($con, $book_info);
            $book_info_row = mysqli_fetch_assoc($book_info_query);


        ?>      

<div class="modal fade" id="book-update-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Information</h4>
            </div>
            <div class="modal-body">

                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <h5 class="mb-lg">Update Book</h5>
                                    <div class="form-group">
                                        <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="book_name" value="<?= $book_info_row['book_name'];?>">

                                            <input type="hidden" class="form-control" name="id" value="<?= $book_info_row['id'];?>">
                                        </div>
                                    </div>                              
                                    <div class="form-group">
                                        <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="book_author_name" value="<?= $book_info_row['book_author_name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_publication_name" class="col-sm-4 control-label">Book Publication Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"  class="form-control" name="book_publication_name" value="<?= $book_info_row['book_publication_name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="book_purchase_date" value="<?= $book_info_row['book_purchase_date'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="book_price" value="<?= $book_info_row['book_price'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_qty" class="col-sm-4 control-label">Book QTY</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="book_qty" value="<?= $book_info_row['book_qty'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="available_qty" class="col-sm-4 control-label">Available qty</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="available_qty" value="<?= $book_info_row['available_qty'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-10">
                                            <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i> UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

     <?php 
        }


    if(isset($_POST['update_book'])){

            $uid = $_POST['id'];
            $book_name = $_POST['book_name'];
            $book_author_name = $_POST['book_author_name'];
            $book_publication_name = $_POST['book_publication_name'];
            $book_purchase_date = $_POST['book_purchase_date'];
            $book_price = $_POST['book_price'];
            $book_qty = $_POST['book_qty'];
            $available_qty = $_POST['available_qty'];
            $libraian_username = $_SESSION['lib_username'];

 
            $update = "UPDATE books SET book_name='$book_name', book_author_name='$book_author_name', book_publication_name='$book_publication_name ', book_purchase_date='$book_purchase_date', book_price='$book_price', book_qty='$book_qty', available_qty='$available_qty', libraian_username='$libraian_username' WHERE id ='$uid' ";

           $result = mysqli_query($con,$update);

           if($result){
                ?>
                    <script>
                        javascript:history.go(-1);
                    </script>
            <?php
           }else{

           }


            

       }



      ?>





    <?php require_once('footer.php');?>       